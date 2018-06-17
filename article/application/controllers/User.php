<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');	
		ini_set("memory_limit","-1");
	}

	public function index(){
		$this->load->view('login');
	}

	public function signup(){
		$data['category']=array();
		$category = Category::find_by_sql("SELECT * FROM category");
		if(!empty($category)){
			foreach($category as $cat)
			$data['category'][] = array('id'=>$cat->id,
									  'cat_name'=>$cat->category_name
									);
		}
		$this->load->view('signup', $data);
	}

	public function ajaxSignup(){
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');	
		$email = $this->input->post('email');	
		$password = md5($this->input->post('password'));	
		$phone = $this->input->post('phone');	
		$dob =	$this->input->post('dob');
		$gender = $this->input->post('gender');
		$preferences = $this->input->post('preferences');
		$user = Account::find_by_email($email);
		if(empty($user)){
			$new = new Account;
			$new->name=  $fname.' '.$lname;
			$new->email = $email;
			$new->password = $password;
			$new->phone = $phone;
			$new->dob = $dob;
			$new->gender = $gender;
			$new->save();
			$user_id = $new->id;
			foreach($preferences as $value){
				$pref = new Preferences;
				$pref->user_id = $user_id;
				$pref->cat_id = $value;
				$pref->save();	
			}
			$query = Account::find_by_sql("SELECT * FROM users WHERE email = '$email' AND password = '$password'");	
				if(!empty($query)){
					foreach($query as $user){
						$args=array('user_id'=>$user->id,'user_email'=>$user->email);
						$this->session->set_userdata($args);
						echo 'success';	
					}	
				}
		}else{
			echo 'failure';
		}
	}

	public function ajaxLogin(){
		
		$username = $this->input->post('username');	
		$password = md5($this->input->post('password'));
		$query = Account::find_by_sql("SELECT * FROM users WHERE email = '$username' AND password = '$password'");	
		if(!empty($query)){
			foreach($query as $user){
				$args=array('user_id'=>$user->id,'user_email'=>$user->email);
				$this->session->set_userdata($args);
			}			
			echo 'success';		
		}
		else{
			$query1 = Account::find_by_sql("SELECT * FROM users WHERE phone = '$username' AND password = '$password'");
			if(!empty($query1)){
				foreach($query1 as $user){
					$args=array('user_id'=>$user->id,'user_email'=>$user->email);
					$this->session->set_userdata($args);
				}			
				echo 'success';		
			}else{
				echo 'failure';
			}
		}
	}

	public function logout(){

		$referer = $_SERVER['HTTP_REFERER'];
		if($referer==base_url())
			$referer = base_url().'user';
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_email');
		$this->session->sess_destroy();
		if(!$this->session->userdata('user_id')) redirect(base_url());
	}

	public function dashboard(){
		if(!$this->session->userdata('user_id')) redirect(base_url());
		$user_id = $this->session->userdata('user_id');
		$user = Account::find_by_id($user_id);
		$data['user_name'] = $user->name;
		$data['articles'] = array();
		$preferences = Preferences::find_all_by_user_id($user_id);
		if(!empty($preferences)){
			foreach($preferences as $preference){
				$articles = Articles::find_all_by_cat_id($preference->cat_id);
				if(!empty($articles)){
					foreach($articles as $article){
						$data['articles'][] = array('id'=>$article->id,
										  'name'=>$article->name,
										  'summery'=>$article->summery,
										  'added_on'=>$article->added_on->format('M d Y')
										  );
					}
				}
			}
		}
		//echo "<pre>"; print_r($data['articles']);exit();
		$this->load->view('include/header');
		$this->load->view('index',$data);
		$this->load->view('include/footer');		
	}

	public function articles(){
		if(!$this->session->userdata('user_id')) redirect(base_url());
		$user_id = $this->session->userdata('user_id');
		$data['articles'] = array();
		$count_contact = 0;
		$total_likes = 0;
		$total_dislikes = 0;
		$total_blocks = 0;
		$articles = Articles::find_all_by_user_id($user_id);
		if(!empty($articles)){
			foreach($articles as $article){
				$data['articles'][] = array('id'=>$article->id,
										  'name'=>$article->name,
										  'summery'=>$article->summery,
										  'added_on'=>$article->added_on->format('M d Y')
										  );
			}
		}
		//echo "<pre>"; print_r($data['articles']);exit();
		$this->load->view('include/header');
		$this->load->view('articles',$data);
		$this->load->view('include/footer');
	}	

	public function addArticle(){
		if(!$this->session->userdata('user_id')) redirect(base_url());
	    $this->load->view('include/header');
	    $this->load->view('addarticle');
	    $this->load->view('include/footer');	
	}

	public function saveArticle($id=0){
		if(!$this->session->userdata('user_id')) redirect(base_url());
		$user_id = $this->session->userdata('user_id');
		$article_name = $this->input->post('article_name');
		$article_summery = $this->input->post('article_summery');
		$article_details = $this->input->post('article_details');
		
		//echo "ghgh";print_r($_FILES['files']['name']);exit();
		if($_FILES['files']['name'])
		if($_FILES['image']['name'])
		//echo '<pre>';print_r($_FILES['file_image']);exit;
		if($_FILES['files']['name'])
		{	
			$name = $_FILES['files']['name'];	
			$file_tmp =$_FILES['files']['tmp_name'];
			$name = $_FILES['image']['name'];	
			$file_tmp =$_FILES['image']['tmp_name'];
			$name = $_FILES['file_image']['name'];	
			$file_tmp =$_FILES['file_image']['tmp_name'];

			$ext = pathinfo($name, PATHINFO_EXTENSION);
			$file_name = $arrData['article_name']."_".time().".".$ext;	
			$destinPath=FCPATH.'/assets/images/articleimage/';
			if(!is_dir($destinPath)){
				$oldmask = umask(0);
				mkdir($destinPath,0777,TRUE);
				umask($oldmask);
			}
			$new_file = FCPATH.'assets/images/articleimage/'.$file_name;	
			move_uploaded_file($file_tmp, $new_file);
			$arrData['image'] = $file_name;
		}
		if($id==0){
				$new = new Articles;
				$new->user_id = $user_id;
				$new->name = $article_name;
				$new->summery = $article_summery;
				$new->detail = $article_details;
				$new->feature_image = $file_name;
				$new->added_on = date('Y-m-d H:i:s');
				$new->save();
		}else{
			$article = Articles::find_by_id($id);
			if(!empty($article)){
				$article->user_id = $user_id;
				$article->name = $article_name;
				$article->summery = $article_summery;
				$article->detail = $article_details;
				if($_FILES['file_image']['name'])
				{
					$article->feature_image = $file_name;
				}
				$article->save();
			}
		}
		redirect(base_url().'user/articles');
	}

	public function viewArticle($id){
	    if(!$this->session->userdata('user_id')) redirect(base_url());
	    $user_id = $this->session->userdata('user_id');
	    $data = array();
	    $data['status'] = 0;
	    $article = Articles::find_by_id($id);
	    if(!empty($article->feature_image)){
	    	$image= $article->feature_image;
	    }else{
	    	$image = '';
	    }
	    $cat_name = Category::find_by_id($article->cat_id);
	    $data['article'] = array('id'=>$article->id,
	    						 'name'=>$article->name,
	    						 'cat_name'=>$cat_name->category_name,
	    						 'image'=>$image,
	    						 'summery'=>$article->summery,
	    						 'detail'=>$article->detail,
	    						 'likes'=>$article->total_likes,
	    						 'dislikes'=>$article->total_dislikes,
	    						 'blocks'=>$article->total_blocks,
	    						 'added_on'=>$article->added_on->format('M d Y')	
	    						);
	    $article_status = Article_status::find_by_user_id_and_article_id($user_id,$id);
	    if(!empty($article_status)){
	    	$data['status'] = $article_status->status_by_user;
	    }
	    $this->load->view('include/header');
	    $this->load->view('viewarticle',$data);
	    $this->load->view('include/footer');
	}

	public function viewMyArticle($id){
	    if(!$this->session->userdata('user_id')) redirect(base_url());
	    $user_id = $this->session->userdata('user_id');
	    $data = array();
	    $data['status'] = 0;
	    $article = Articles::find_by_id($id);
	    if(!empty($article->feature_image)){
	    	$image= $article->feature_image;
	    }else{
	    	$image = '';
	    }
	    $cat_name = Category::find_by_id($article->cat_id);
	    $data['article'] = array('id'=>$article->id,
	    						 'name'=>$article->name,
	    						 'cat_name'=>$cat_name->category_name,
	    						 'image'=>$image,
	    						 'summery'=>$article->summery,
	    						 'detail'=>$article->detail,
	    						 'likes'=>$article->total_likes,
	    						 'dislikes'=>$article->total_dislikes,
	    						 'blocks'=>$article->total_blocks,
	    						 'added_on'=>$article->added_on->format('M d Y')	
	    						);
	    $this->load->view('include/header');
	    $this->load->view('viewmyarticle',$data);
	    $this->load->view('include/footer');
	}

	public function editArticle($id){
		if(!$this->session->userdata('user_id')) redirect(base_url());
		$user_id = $this->session->userdata('user_id');
		 $data = array();
	    $article = Articles::find_by_id($id);
	    if(!empty($article->feature_image)){
	    	$image= $article->feature_image;
	    }else{
	    	$image = '';
	    }
	    $data['article'] = array('id'=>$article->id,
	    						 'name'=>$article->name,
	    						 'image'=>$image,
	    						 'summery'=>$article->summery,
	    						 'detail'=>$article->detail	
	    						);

	    $this->load->view('include/header');
	    $this->load->view('editarticle',$data);
	    $this->load->view('include/footer');
	}	

	public function ajax_Update_profile(){
		if(!$this->session->userdata('user_id')) redirect(base_url());
		$user_id = $this->session->userdata('user_id');
		$name = $this->input->post('name');	
		$email = $this->input->post('email');	
		$password = $this->input->post('password');	
		$phone = $this->input->post('phone');	
		$dob = $this->input->post('dob');
		$gender = $this->input->post('gender');
		$preferences = $this->input->post('preferences');
		$user = Account::find_by_email($email);
		if(!empty($user)){
			$user->name=  $name;
			$user->email = $email;
			if($user->password != $password){
				$user->password = md5($password);
			}
			$user->phone = $phone;
			$user->dob = $dob;
			$user->save();

			$pref = Preferences::find_all_by_user_id($user_id);
			if(!empty($pref)){				
				foreach($pref as $value){
					$value->delete();
				}
				foreach($preferences as $preference){
					$new = new Preferences;
					$new->user_id = $user_id;
					$new->cat_id = $preference;
					$new->save();
				}
			}else{
				foreach($preferences as $value){
					$new = new Preferences;
					$new->user_id = $user_id;
					$new->cat_id = $value;
					$new->save();
				}
			}
		}
	}	

	public function ajaxDeleteArticle(){
		$user_id = $this->session->userdata('user_id');
		$article_id = $this->input->post('article_id');	
		$del_article = Articles::find_by_id($article_id);
		if(!empty($del_article)){
			$del_article->delete();
			echo json_encode(array('message' => 'success'));
		}
	}	

	public function likeArticle(){
		$user_id = $this->session->userdata('user_id');
		$article_id = $this->input->post('article_id');	
		$article = Articles::find_by_id($article_id);
		if(!empty($article)){
			$status = Article_status::find_by_user_id_and_article_id($user_id,$article_id);
			if(!empty($status)){
				if($status->status_by_user == 2){
					$status->status_by_user = 1;
					$status->save();
					$article->total_likes = $article->total_likes+1;
					if($article->total_dislikes != 0){
						$article->total_dislikes = $article->total_dislikes-1;
					}
					$article->save();
				}else{
					$article->total_likes = $article->total_likes+1;
					$article->save();
				}				
			}else{
				$new = new Article_status;
				$new->user_id = $user_id;
				$new->article_id = $article_id;
				$new->status_by_user = 1;
				$new->save();
				$article->total_likes = $article->total_likes+1;
				$article->save();
			}
			
			echo json_encode(array('message' => 'success'));
		}
	}

	public function dislikeArticle(){
		$user_id = $this->session->userdata('user_id');
		$article_id = $this->input->post('article_id');	
		$article = Articles::find_by_id($article_id);
		if(!empty($article)){
			$status = Article_status::find_by_user_id_and_article_id($user_id,$article_id);
			if(!empty($status)){
				if($status->status_by_user == 1){
					$status->status_by_user = 2;
					if($article->total_likes != 0){
						$article->total_likes = $article->total_likes-1;
					}
					$article->total_dislikes = $article->total_dislikes+1;
					$status->save();
					$article->save();
				}else{
					$article->total_dislikes = $article->total_dislikes+1;
					$article->save();
				}				
			}else{
				$new = new Article_status;
				$new->user_id = $user_id;
				$new->article_id = $article_id;
				$new->status_by_user = 2;				
				$article->total_dislikes = $article->total_dislikes+1;
				$article->save();
				$new->save();
			}
			echo json_encode(array('message' => 'success'));
		}
	}

	public function statistics(){
		if(!$this->session->userdata('user_id')) redirect(base_url());
		$user_id = $this->session->userdata('user_id');
		$user = Account::find_by_id($user_id);
		$data = array();
		$count_contact = 0;
		$total_likes = 0;
		$total_dislikes = 0;
		$total_blocks = 0;
		$articles = Articles::find_all_by_user_id($user_id);
		if(!empty($articles)){
			foreach($articles as $article){
				$total_likes = $total_likes + $article->total_likes;
				$total_dislikes = $total_dislikes + $article->total_dislikes;
				$total_blocks = $total_blocks + $article->total_blocks;
			}
		}
		$data['articles']=count($articles);
		$data['total_likes']=$total_likes;
		$data['total_dislikes']=$total_dislikes;
		$data['total_blocks']=$total_blocks;
		$data['user_name']=$user->name;
		$month = 12;
		for ($i=01; $i<=$month ; $i++) { 
			$total_appoint = 0;
			$articledata = Articles::find_by_sql("select * from articles where MONTH(`added_on`)=$i and YEAR(`added_on`) = date('Y')");
			$data['articleChart'][] = array(
				'year' => date('Y'),
				'month' => $i,
				'total_article' => count($articles)
			);
		}
		$this->load->view('include/header');
		$this->load->view('statistics',$data);
	}

	public function settings(){
		if(!$this->session->userdata('user_id')) redirect(base_url());
		$user_id = $this->session->userdata('user_id');
		$data['user'] = array();
		$data['preference'] = array();
		$data['category'] = array();
		$user_detail = Account::find_by_id($user_id);	
		if(!empty($user_detail)){
			$data['user'] = array('id'=>$user_detail->id,
								  'name'=>$user_detail->name,
								  'phone'=>$user_detail->phone,
								  'email'=>$user_detail->email,
								  'gender'=>$user_detail->gender,
								  'dob'=>$user_detail->dob,
								  'password'=>$user_detail->password
								 );
		}
		$category = Category::find_by_sql("SELECT * FROM category");
		if(!empty($category)){
			foreach($category as $value){
				$preferences = Preferences::find_by_user_id_and_cat_id($user_id,$value->id);
				if(!empty($preferences)){
					$checked = 'true';
				}else{
					$checked = 'false';
				}
				$data['category'][]= array('id'=>$value->id,
											'cat_name'=>$value->category_name,
											'checked'=>$checked												
											);
			}
		}
		$this->load->view('include/header');
		$this->load->view('settings',$data);
		$this->load->view('include/footer');
	}
}
