<form method=post id = "test_form"  >
<?php foreach ($testToUserHierarhy as $test)
{
echo "<h1>".$test["test_title"]."</h1>";

	foreach ($test["questions"] as $question_id =>$question)
	{
		echo "<h2>".$question["question_title"]."</h2>";
		echo "<ul>";
			echo $question["right_answers"]==$question["user_answers"]?" вопрос засчитан":""."</br>";
			
			foreach ($question["answers"] as $answer_id=>$answer)
			{
		
			$type = ( $question["right_answers"]>1)?"checkbox":"radio";
			echo "<li><input  disabled ".($answer["user_choice"]=="+"?"checked":"")." type =".$type." name =\"".$question_id."\" value=\"".$answer_id."\">".$answer["answer_title"]."</li>";
			}
		echo "</ul>";
	}
}

?>

