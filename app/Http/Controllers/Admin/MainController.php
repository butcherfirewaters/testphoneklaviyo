<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Klaviyo\Klaviyo;
use Klaviyo\Model\ProfileModel as KlaviyoProfile;

class MainController extends Controller
{
    public $client;
    public $contacts;

    public function __construct(Contact $contacts)
    {
        $this->contacts = $contacts->with('user');
        $this->middleware('auth');
    }

    public function index(){

        if ($this->contacts){
            $contacts = $this->contacts->where('user_id', Auth::id())->get();
            if(!$contacts->count()){
                return view('admin.index');
            }else {
                return view('admin.index', compact('contacts'));
            }

        }

    }

    public function sendToKlavio(){
        //здесь лучше доставать данные через env
        $client = new Klaviyo(env('PRIVAT_KEY_KLAVIO'),env('PUBLIC_KEY_KLAVIO'));

        //$client->lists->createList('MyList'); //тут желательно дать пользователю создавать Листы

        $arrayOfProfiles = Contact::find('2')->first()->toArray();

        $profile = array(
            new KlaviyoProfile(
                array(
                    '$id' => '1',
                    '$email' => "dan@divinusinc.com",
                    '$first_name' => "Test",
                    '$phone_number' => '0972226632'
                )));

        $client->lists->addMembersToList( 'Preview List ', $profile );

        //А тут я получаю ошибку - ErrorException
        //Undefined index: detail
        //Почему это происходит - непоняно

        //$client->lists->addMembersToList( 'ListId', $arrayOfProfiles );
        dd($client);
    }
}
