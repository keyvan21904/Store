<?php $type = @$_REQUEST['error'] ?: @$_REQUEST['success'] ?>
<?php if ($type): ?>
	<div class="alert alert-<?php echo (@$_REQUEST['success'] ? 'success' : 'danger')?>">
		<?php switch($type) { 

			 	case 'username':
			 		echo 'username is already taken.';
		 			break;
		 		case 'usernameInvalid':
		 			echo 'username or password is invalid!';
		 			break;
		 			case 'register':
		 				echo 'ثبت نام با موفقیت انجام شد';
		 		
		 	} 
		 	
		 ?>
	</div>
<?php endif ?>