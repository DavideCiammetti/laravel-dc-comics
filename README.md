# USO DEL CRUD(CREATE, READ, UPDATE, DELETE)

## collegamenti generali 

---------CREAZIONE MODEL---------
1) con il comando **php artisan make:model nome_model**--il nome in maiuscolo (pascal case), creiamo il model in models dir 

--------CREAZIONE CONTROLLER--------
2) tramite il comando **php artisan make:controller controller_name**---> il nome puo (deve) essere composto da una nuova directory es.-> Guest/PageController

pero c'è un altro tipo di controller cioe il resource controller, che automaticamente crea le funzione per il CRUD, per il comando scriviamo:------> **php artisan make:controller controller_name --resources**---> quindi aggiungiamo solo '--resources'
che puo essere messo sia prima che dopo il nome del controller 

 ora nella directory -routes- andiamo nel file web.php e colleghiamo la rout al controller usando:
 **Route::resource('comics_management', controller_name::class);** IN QUESTO MODO PRENDIAMO TUTTE LE FUNZIONE NELLA controller_name

-------MIGRATION-----------
3) per creare le tabelle per il db usiamo le migration che a loro volta saranno collegate al seeder
per creare una migration usiamo il comando ---> **php artisan make:migration nome_migration** e per andare ad importare le tabelle nel db usiamo il comando **php artisan migrate** 
 ------AGGIORNARE UNA TABELLA------> per aggiornare una tabella usiamo il comando **php artisan make:migration upload_nome_migration --table=nome_tabella** quando andiamo ad aggiornare un campo mettiamo il change es.---> $table->string('title', 120)->change();

---------SEEDER----------
 4) creazione della seeder che serve per inserire i dati all'interno del nostro db e possiamo usare diversi modi.
 il comando per creare una seeder è **php artisan make:seeder nome_seeder** una volta creata si fa:
            $comic = config('dcomics_db');  ---> si prendono i dati dalla dir config in questo caso 'dcomics_db'
        foreach ($comic as $comics_item) {    ---> si fa un foreach per ciclare i dati che abbiamo 

            $comics = new Comic();          ---> in questo modo invece creaiamo un istanza del nostro model nel quale sono presnti i dati

            $comics->title = $comics_item['title'];      ---->in questo modo prendiamo il titolo dai dati che abbiamo 

            $comics->save();                             ---> cosi stiamo salvando nel db
        }


        --------------COLLEGAMENTI PER IL CRUD------------

nel file web.php in routes dobbiamo lasciare --->Route::get('/', function () {return view('welcome');});   che rappresenta la nostra home page
mentre le funzioni nel controller le colleghiamo alle pagine interessate da tenere a mente che:
------------------------INDEX-------------------------------

 la funzione index() rappresenta la pagina nella quale prendiamo i dati (GET) 

-----------------------CREATE-------------------------------

la funzione create() viene usata per mostrare il form che usiamo per andare ad inserire i dati nel db 
    per il collegamento tra form e db usiamo un altra funzione ciore STORE(). #######IMPORTANTE######## ---> IL NAME="" ALL'INTERNO DEI CAMPI DEL FORM DEVE ESSERE IDENTICO ALLE CHIAVI DEL DATABASE 
------------------------STORE-------------------------------

    esempio di una store funzione--->
    °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
      public function store(Request $request){

      $data = $request->all(); -->mandiamo una richiesta che viene dal form dove prendiamo all()

        $comic = new Comic();--> qua creiamo una istanza del Model 

        $comic->title = $data['title'];---> qua assegnamo il dato preso dal form al model 
        $comic->type = $data['type'];---> qua assegnamo il dato preso dal form al model 

        $comic->save();---> qua salviamo e mandiamo al db

        return redirect()->route('comics_management.show', $comic->id);---> qua invece stiamo mandando i dati presi dal form salvati nel db nella                                                               pagina **comics_management.show quindi li stiamo mostrando a schermo
      }

    °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    un altro modo per inserire i dati nello store è usando:
      $comic->fill($data); quindi non avremo l'elenco dei dati da modificare 
- SHOW la funzione show() serve per prendere gli elementi per id quindi prendera il singolo elemnto


## aggiornare modificare ed eliminare (PUT/PATCH, DELETE)

----------EDIT-------------

per iniziare partiamo con edit()  il metodo che ci mette a disposizione resources di laravel per andare a prendere i campi di una riga nella nostra tabella per poi modificarli, edit si aspetta un indce e la sua path sarà--> in questo caso coics\{index}\edit

infatti nell'edit noi prendiamo i dati di un singolo id e una volta modificati inviamo il form e sarà il seconod metodo ad accogliere i dati modificati e cioe update().
Ma restando su edit() nel form si aspetta 2 metodi diversi oltre il post o PUT O PATCH---> Supponiamo che vogliamo usare PUT, si deve mettere sotto il codice @csfr con @method('PUT')

----------UPDATE-------------

per quanto riguarda update serve appunto nel mandare i dati modificati al db e volendo se necessario mostrarli con il metodo show a schermo, ma per prendere i dati modificati possiamo usare 2 modi, perche update() prevede che al suo interno vengano passate le informazioni dei dati che si vogliono modificare:

1) possiamo inserire tuttla lista dei dati da modificare come---->

        $comic->title = $data['title'];
        $comic->type = $data['type'];
        $comic->description = $data['description'];
        $comic->save();
        return redirect()->route('comics.show', $comic->id);

2) usando l'istanza del models come parametro per la funzione update(Comic $comic)

        $data = $request->all();----->prima prendiamo tutti dati dalla tabella

        $comic->update($data);------->questo esegue per noi l'operzione di assegnare i valori a $comic
        return redirect()->route('comics.show', $comic->id);

Ma arrivati fin qui con il secondo modo scritto vedremo un errore e questo perche non abbiamo inserito 2 proprieta che vanno a specificare la protezione dei campi esono:

FILLABLE---> il quale ci permette di inserire secondo la sua sintassi---> **protected $fillable = ['nome-campo_da_modificare'];
            quindi come si può intuire all'interno di fillable andiamo ad inserire solo i campi che vogliamo modificare e gli altri non verranno toccati 
GUARDED----> Il quale al contrario di fillable in automatico ci sta inserendo tutti i campi della tabella e noi scriviamo al suo interno quelli che NON vogliamo modificare es:--->  protected $guarded = ['nome_campo_da_non_modificare'];

-------------------------------DELETE----------------------------------------

Per eliminare un elemento usiamo il metodo DESTROY:

 public function destroy(Comic $comic)
  {
      $comic->delete();
      return redirect()->route('comics.index', $comic->id);
  }

anche in questo caso possiamo usare piu modi per prendere l'istanza di comic quinid usando il find():
       $comic = Comic::findOrFail($id);--->oppure---> $comic = Comic::find($id);
       la differenza è che se un elemeto è nullo fail nel primo caso

------>per usare pero destroy() dobbiamo NECESSARIAMENTE creare un form che ci porti proprio a destroy perche dobbiamo usare il method('DELETE'):
        <form action="{{route('comics.destroy', $comic->id)}}" method="POST">----> ROUTE CHE CI PORTA A DESTROY ALLA QUALE PASSIAMO INDEX CORRENTE
        
            @csrf--------->CODICE DI SICUREZZA
            @method('DELETE')---------->METHOD DELETE

            <input type="submit" value="DELETE">
        </form>
