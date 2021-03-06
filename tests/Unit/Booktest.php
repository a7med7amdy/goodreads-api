<?php

namespace Tests\Unit;
use App\Review;
use App\Book;
use App\User;
use App\Http\Controllers\ReviewController;
use Tests\TestCase;
use Illuminate\App\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    /**
     * 
     * @test
     * @return void
     */
    public function testcreate()
    {
        $tt1 = new Review;
        $tt3 = new Book;
        $tt3->setauthor(1000000,'a7med7amdy','2019-03-21 00:00:00','2019-03-21 00:00:00');
        $tt3->setBook(1000000,'ppp',1,'dsds','2019-03-21 00:00:00','fgdg','dfgdg','fdgd',4,5,9,1000000,8,'2019-03-21 00:00:00','2019-03-21 00:00:00');
        $tt3->setgenre(1000000,1000000,'action');
        $tt3->setuser('1000000', 'ahmed', 'dssdsd', 'dsdsdd', '2019-04-12 00:00:33', '0000', 'ffdfdf', 'sdsdsd', 'sddsdsd', 'sddsds', '5', 'fdf', 'dffdf', 'dfdf', '2019-04-16', '1', '5', '5', '6', '2019-04-15', 'fgmfkgmfgk', '2019-04-12 00:17:00', '2019-04-12 00:00:00');
        $tt3->setshelves(1000000,1000000,1000000,0);
        $user=$tt1->getuserMax(); 
       $tt1->setshowReviewOfBook(1000000,1000000,1000000,'dsds',0,5,4,4,'2019-03-21 00:00:00','2019-03-21 00:00:00');
       $this->assertTrue(true);

    }
    /**
     * test
     * @return void
     */
    public function testA()
    {
        ///////////////////////////////////
        // Get the number of users in the database
        ////$usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        ////$randomUserId = 1;//rand(1, $usersCount);
        // Get the record of this user
        ////$user = User::find($randomUserId);
        ////$loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        $loginResponse = $this->json('POST', 'api/login', ['email' =>'dsdsdd', 'password' => 'password']);

        
        $jsonArray = json_decode($loginResponse->content(),true);
       //// $token = $jsonArray['token'];
        ////////////////////////////////////////
       //// $res=$this->json('get','api/Books/book_Authorname',['Author_name'=>'a7med7amdy','token'=>$token,'token_type'=>'bearer']);
       
       $res=$this->json('get','api/Books/book_Authorname',['Author_name'=>'a7med7amdy','token'=>'fgmfkgmfgk','token_type'=>'bearer']);
       
       
       $data = json_decode($res->getContent(),true);
       $indicator=0;
       for($i=0;$i<sizeof($data['pages']);$i=$i+1){
           if($data['pages'][$i]['title']=='ppp')
               $indicator=$i;
       }
        $this->assertEquals('action' , $data['pages'][ $indicator]['genre']);
        $this->assertEquals('ppp',$data['pages'][ $indicator]['title']);
        $this->assertEquals(1 , $data['pages'][ $indicator]['isbn']);
    }
    /**
     * test
     * @return void
     */
    public function testB()
    {
        ///////////////////////////////////
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = 1;//rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        $jsonArray = json_decode($loginResponse->content(),true);
        $token = $jsonArray['token'];
        ////////////////////////////////////////
        $res=$this->json('get','api/Books/book_ISBN',['ISBN'=>'1','token'=>$token,'token_type'=>'bearer']);
        $data = json_decode($res->getContent(),true);
        $this->assertEquals('action' , $data['pages'][0]['genre']);
        $this->assertEquals('ppp',$data['pages'][0]['title']);
    }
    /**
     * test
     * @return void
     */
    public function testC()
    {
        ///////////////////////////////////
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = 1;//rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        $jsonArray = json_decode($loginResponse->content(),true);
        $token = $jsonArray['token'];
        ////////////////////////////////////////
        $res=$this->json('get','api/Books/book_title',['title'=>'ppp','token'=>$token,'token_type'=>'bearer']);
        $data = json_decode($res->getContent(),true);
        $this->assertEquals('action' , $data['pages'][0]['genre']);
        $this->assertEquals('ppp',$data['pages'][0]['title']);
        $this->assertEquals(1 , $data['pages'][0]['isbn']);
    }
    /**
     * test
     * @return void
     */
    public function testD()
    {
        ///////////////////////////////////
        // Get the number of users in the database
        ////$usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
       //// $randomUserId = 1000000;//rand(1, $usersCount);
        // Get the record of this user
       //// $user = User::find($randomUserId);
        $loginResponse = $this->json('POST', 'api/login', ['email' =>'dsdsdd', 'password' => 'password']);
        $jsonArray = json_decode($loginResponse->content(),true);
       //// $token = $jsonArray['token'];
        ////////////////////////////////////////
        $res=$this->json('get','api/books/genre',['genreName'=>'action','token'=>'fgmfkgmfgk','token_type'=>'bearer']);
        $data = json_decode($res->getContent(),true);
       $indicator=0;
        for($i=0;$i<sizeof($data['pages']);$i=$i+1){
            if($data['pages'][$i]['title']=='ppp')
                $indicator=$i;
        }
       
         $this->assertEquals('ppp',$data['pages'][$indicator]['title']);
        $this->assertEquals(1 , $data['pages'][$indicator]['isbn']);
    }
    /**
     * test
     * @return void
     */
    public function testF()
    {
        ///////////////////////////////////
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = 1;//rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        $jsonArray = json_decode($loginResponse->content(),true);
        $token = $jsonArray['token'];
        ////////////////////////////////////////
        $res=$this->json('get','api/books/show',['book_id'=>'1000000','token'=>$token,'token_type'=>'bearer']);
        $data = json_decode($res->getContent(),true);
        $this->assertEquals('action' , $data['pages'][0]['genre']);
        $this->assertEquals('ppp',$data['pages'][0]['title']);
        $this->assertEquals(1 , $data['pages'][0]['isbn']);
    }
    /**
     * test
     * @return void
     */
    public function testR()
    {
        ///////////////////////////////////
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = 1;//rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        $jsonArray = json_decode($loginResponse->content(),true);
        $token = $jsonArray['token'];
        ////////////////////////////////////////
        $res=$this->json('get','api/shelf/getbook',['user_id'=>'1000000','shelf_name'=>'0','token'=>$token,'token_type'=>'bearer']);
        $data = json_decode($res->getContent(),true);
        $this->assertEquals(1000000 , $data['pages'][0]['book_id']);
    }
    /**
     * test
     * @return void
     */
    public function testdeletion()
    {
        $tt1 = new Review;
        $tt3 = new Book;
        $tt3->deletegenre(1000000);
        $tt1->deleteshowReviewOfBook(1000000);
        $tt3->deleteshelves(1000000);
        $tt3->deleteBook(1000000);
        $tt3->deleteauthor(1000000);
        $tt3->deleteuser(1000000);
        $this->assertTrue(true);

    }
}
