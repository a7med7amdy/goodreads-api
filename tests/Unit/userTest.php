<?php

namespace Tests\Unit;
use App\Review;
use App\Book;
use App\Http\Controllers\ReviewController;
use Tests\TestCase;
use Illuminate\App\Http\Request;
use DB;
use Validator;
use Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;

class userTest extends TestCase
{
    
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testexmplecreation()
    {
        $tt1 = new Review;
        $tt2=new ReviewController;
        $tt3 = new Book;
        $tt3->setBook(1000000,'ppp',1,'dsds','2019-03-21 00:00:00','fgdg','dfgdg','fdgd',4,5,9,'jyj',4,8,'2019-03-21 00:00:00','2019-03-21 00:00:00');
        $tt1->setshowReviewOfBook(1000000,2,1000000,'dsds',0,5,4,4,'2019-03-21 00:00:00','2019-03-21 00:00:00');
        $this->assertTrue(true);

    }

    public function testExample1()
        {
            $tt1 = new Review;
            $tt2=new ReviewController;
            $title['title']='ppp';
           Request $request['title']='ppp';
            $res= $tt2->getReviewsByTitle((Request)$title)->getContent();
            $data = json_decode($res,true);
            $this->assertEquals(2 , $data['pages'][0]['user_id']);
            $this->assertEquals(1000000 , $data['pages'][0]['book_id']);
            $this->assertEquals('dsds',$data['pages'][0]['body']);
            $this->assertEquals('read' , $data['pages'][0]['shelf_name']);
            $this->assertEquals(5 , $data['pages'][0]['rating']);
            $this->assertEquals(4 , $data['pages'][0]['likes_count']);
            $this->assertEquals(4 , $data['pages'][0]['comments_count']);
        }
    public function testExample2()
    {
        $tt1 = new Review;
        $tt2=new ReviewController;
        $res= $tt2->showReviewOfBook(1000000)->getContent();
        $data = json_decode($res,true);
        $this->assertEquals(2 , $data['pages'][0]['user_id']);
        $this->assertEquals(1000000 , $data['pages'][0]['book_id']);
        $this->assertEquals('dsds',$data['pages'][0]['body']);
        $this->assertEquals('read' , $data['pages'][0]['shelf_name']);
        $this->assertEquals(5 , $data['pages'][0]['rating']);
        $this->assertEquals(4 , $data['pages'][0]['likes_count']);
        $this->assertEquals(4 , $data['pages'][0]['comments_count']);
    }
    public function testExample3()
    {
        $tt1 = new Review;
        $tt2=new ReviewController;
        $res= $tt2->showReviewForBookForUser(2,1000000)->getContent();
        $data = json_decode($res,true);
        $this->assertEquals('dsds',$data['pages'][0]['body']);
        $this->assertEquals('read' , $data['pages'][0]['shelf_name']);
        $this->assertEquals(5 , $data['pages'][0]['rating']);
    }
        //23mel funcs kman lkol el controller's function elly ha test ISA
        public function testExample4()
        {
            $tt1 = new Review;
            $tt2=new ReviewController;
            $res= $tt2->showReviewsForBook(1000000)->getContent();
            $data = json_decode($res,true);
            $this->assertEquals(1000000 , $data['pages'][0]['id']);
            $this->assertEquals('dsds',$data['pages'][0]['body']);
            $this->assertEquals('read' , $data['pages'][0]['shelf_name']);
            $this->assertEquals(5 , $data['pages'][0]['rating']);
        } 
        public function testexmpledeletion()
    {
        $tt1 = new Review;
        $tt2=new ReviewController;
        $tt3 = new Book;
        $tt1->deleteshowReviewOfBook(1000000,2,1000000,'dsds',0,5,4,4,'2019-03-21 00:00:00','2019-03-21 00:00:00');
        $tt3->deleteBook(1000000,'ppp',1,'dsds','2019-03-21 00:00:00','fgdg','dfgdg','fdgd',4,5,9,'jyj',4,8,'2019-03-21 00:00:00','2019-03-21 00:00:00');
        $this->assertTrue(true);

    }
}