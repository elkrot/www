<?php
  class Html {
	static function Link($target="",$action="",$id="") {
		if ($target==""&&$action==""&&$id==""){
			$param_str = "";
		}else {
			$param_str = "?".($target==""?"":"target=".$target
					.($action==""?"":"&action=".$action
							.($id==""?"":"&id=".$id)));
		}
		return SERVER_NAME_URL.$param_str;
	}
	static function Ankor($link,$title) {
		return "<a href=\"".$link."\">".$title."</a>";
	}
}