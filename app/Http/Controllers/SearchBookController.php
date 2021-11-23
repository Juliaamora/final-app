<?php

namespace App\Http\Controllers;

use App\Models\Search;
use App\Models\Searchterm;
use Illuminate\Http\Request;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class SearchBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function scrape()
    {
        $client = new Client();
        $crawler = client->request('GET', 'https://www.google.com/search?tbm=bks&q=Codex+Alera');
        $crawler->filter('h3')->each(function ($node){
            print $searchterm.$node.text()."\n";
        });
        
        $searchterm = $request->input('searchterm');

        //$results = Http::Http::get('https://www.lovelybooks.de/mapi/search/detail/books?q=codex%20alera&size=6&page=0');

        return view('search.search', compact('searchterm'));
    }

    public function index()
    {     
    }
    //@return \Illuminate\Http\Response
    public function create()
    {
    }

    // @param  \Illuminate\Http\Request  $request
     // @return \Illuminate\Http\Response

    public function store(Request $request)
    {
        $search_input = array(
            'term' => $request->searchterm,
        );
        Searchterm::create($search_input);
        $shownTerm = json_encode($search_input);
        return redirect()->route('search')
                        ->with('success','Ergebnisse für: '.$shownTerm);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    
     public function show(Search $search)
    {
        //return view('search.search',compact('search'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function edit(Search $search)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Search $search)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function destroy(Search $search)
    {
        //
    }
}
/*
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Illuminate\Support\Facades\Https;
//use GuzzleHttp\Client as GuzzleClient;

class SearchBookController extends Controller
{
    public function getBookTitle() 
    {
        $response = Http::get('https://www.lovelybooks.de/mapi/search/detail/books?q=codex%20alera&size=6&page=0');
        return $response['title'];
    }


}

*public function getBookTitle(string $title): string
*   {
*        $goutteClient = new Client();
*        $guzzleClient = new GuzzleClient(array(
*            'timeout' => 60,
*            'verify' => false
*        ));
*        $goutteClient->setClient($guzzleClient);
*        $crawler = $goutteClient->request('GET', 'https://duckduckgo.com/html/?q=Laravel');
*        
*        $crawler->filter('.result__title .result__a')->each(function ($node) {
*            dump($node->text());
*        });
*        //return view('dashboard');
*    } 
*/