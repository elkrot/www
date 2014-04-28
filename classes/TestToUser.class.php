<?php 



/**
 * Класс TestToUser Класс тестов-вопросов и ответов для отображения пользователю
 *
 *
 * @author Ф.И.О. <e-mail>
 * @version 1.0
 */
//test_id 	question_id 	sort 	test_title 	question_title 	answer_title 	is_right 	answer_id
class TestToUser extends Table  {
	public function __construct($where="",$params=array(),$limit="",$order_by=" order by t.id, q.id , l.sort"){
		$this->sql="select l.*, t.test_title, r.id answer_id, q.question_title
					, r.answer_title, r.is_right, q.rating_cost FROM test_detail l left join test t on l.test_id = t.id 
					left join question q on q.id = l.question_id 
					left join answer r on r.question_id = q.id where 1=1 ";
		parent::__construct($where,$params,$limit,$order_by);
	}

	public function GetTestToUserHierarchy($post = array())
	{
		$ret = array();
		$test_id = 0;
		$question_id = 0;
		$isAnswerInPost = true;
		$wrong_user_answers=0;
		$total_rating=0;
		foreach ($this as $value)
		{
			$test_id = $value["test_id"];
			$question_id = $value["question_id"];
			$answer_id = $value["answer_id"];
			$user_answers = $ret[$test_id]["questions"][$question_id]["user_answers"]?
			$ret[$test_id]["questions"][$question_id]["user_answers"] :0;
			$user_choice = (!empty($post)&& self::IsAnswerInPost($post,$question_id,$answer_id))?"+":"";
			$total_answer = (int)isset($ret[$test_id]["questions"][$question_id]["total_answer"])?$ret[$test_id]["questions"][$question_id]["total_answer"]:0;
			$right_answers = (int)isset($ret[$test_id]["questions"][$question_id]["right_answers"])?$ret[$test_id]["questions"][$question_id]["right_answers"]:0;
			$ret[$test_id]["test_title"]=$value["test_title"];
			$ret[$test_id]["questions"][$question_id]["question_title"]=$value["question_title"];
			$ret[$test_id]["questions"][$question_id]["answers"][$answer_id] 
			= array("answer_title"=>$value["answer_title"]
					,"user_choice"=>$user_choice,"sort"=>$value["sort"]);
			
			$ret[$test_id]["questions"][$question_id]["total_answer"]=$total_answer+1;
			
			$ret[$test_id]["questions"][$question_id]["right_answers"] = $right_answers +($value["is_right"]=="+"?1:0);
			
			$ret[$test_id]["questions"][$question_id]["user_answers"] = $user_answers + 
			(($value["is_right"] == "+")&&(!empty($post)&&self::IsAnswerInPost($post,$question_id,$answer_id))?1:0);
			
		$wa = isset($ret[$test_id]["questions"][$question_id]["wrong_user_answers"])?
			$ret[$test_id]["questions"][$question_id]["wrong_user_answers"]:0;
			$ret[$test_id]["questions"][$question_id]["wrong_user_answers"]=$wa
			 +(int)(($value["is_right"] != $user_choice)?1:0);
			$ret[$test_id]["questions"][$question_id]["rating_cost"]=$val["rating_cost"];
			
			Logger::getInstance()->log($val["rating_cost"]);
		
		}
		
		foreach ($ret as &$test){
			
			foreach ($test["questions"] as $questions){
				
				if ($questions["wrong_user_answers"]==0){
					
					$total_rating=isset($test["total_rating"]) ?$test["total_rating"]:0;
					$test["total_rating"]=$total_rating+$questions["rating_cost"];
				}
			}
		}
		return $ret;
	}
	
	public static function IsAnswerInPost($post=array(),$question_id=0,$answer_id=0) {
		
		return (is_array ( $post[$question_id] ) && in_array ( $answer_id, $post[$question_id] )) ;
	}
}