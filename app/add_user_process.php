<?php
include_once './include_mini.php';
include_once './APSource.php';

if (editCheck(1)) {
    $email = mysql_real_escape_string($request->get('login'));
    $access = $request->get('access');
    if (!isset($access) || !$access) {$access=4;}

    if ($access==4) {
        $team=-1;
    } else {
        $team = $request->get('team');
    }

    /*$query = "SELECT login FROM `users` WHERE login='$login'";
    $result = mysql_query($query);
    $numrows = mysql_numrows($result);*/
    $users_with_email = $db->getUser(NULL, $email);

    if (!empty($users_with_email)) {
        echo "That email is already taken.  User not added.";
    } else {
      $APSource = new APSource();
      $users = $APSource->getUserByEmail($email);
      if (count($users) == 1) {
        $matching_user = current($users);
        $user_info = array(
          'email' => $email,
          'team' => $team,
          'access' => $access,
          'uuid' => $matching_user->uuid,
        );
        $db->addUser($user_info);
      }
      else {
        echo "There were multiple users found with this email address."; // @todo just add a uuid field for resolution.
      }


    }
}
