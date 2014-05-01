<form method=post id = "test_form"  >
<?php 
if (is_array($testToUserHierarhy) && !empty($testToUserHierarhy)){
foreach ($testToUserHierarhy as $test)
{
echo "<h1>".$test["test_title"]."</h1>";
echo "<h2>Набрано баллов: ".$test["total_rating"]."<h2>";
	foreach ($test["questions"] as $question_id =>$question)
	{
		echo "<h2>".$question["question_title"]."</h2>";
		echo "<ul>";
			echo $question["wrong_user_answers"]==0?" вопрос засчитан":""."</br>";
			
			foreach ($question["answers"] as $answer_id=>$answer)
			{
			$type = ( $question["right_answers"]>1)?"checkbox":"radio";
			echo "<li><input  disabled ".($answer["user_choice"]=="+"?"checked":"")." type =".$type." name =\"".$question_id."\" value=\"".$answer_id."\">".$answer["answer_title"]."</li>";
			}
			
		echo "</ul>";
	}
}
}
?>

