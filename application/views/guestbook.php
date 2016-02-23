<!DOCTYPE html>
<html>
  <head>
  <style type="text/css">
   input {
    font-size: 15px;
    width: 150px;
    display: block;
    border: 1px solid #999;
    height: 25px;
    -webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
    -moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
   }
   textarea {
    font-size: 15px;
   }
   #human {
    display: none;
   }
   #submit {
    width: 100px;
    font-weight: bold;
   } 
   #delete {
    font-size: 15px;
    width: 100px;
    display: inline-block;
    background-color: #FA58F4;
    border-radius: 8px;
   }
   h3 {
    text-align: center;
   }
   #comment-box {
    border: 1px solid #F6CEEC;
    padding: 2px 2px 2px 2px;
   }

  </style>
  <title> </title>
  </head>
  <body>
    <h3>Welcome To My CodeIgniter Guest Book</h3>
    <form method="post" action="/guestbook/index.php/guestbook/create">
      <fieldset>
        <legend>Add A Comment</legend>
        <lable for="name">First Name</label></br>
        <input id="name"  name="name" type="text"/>
        <label for="email">Email</label><br>
        <input id="email" name="email" type="text"/>
        <label for="comment">Comment</label><br>
        <textarea id="comment" cols="45" rows="10" placeholder="type your comment here" name="comment"></textarea></br> 
        <input  id="human" name="human" type="text"/>
        <input id="submit" type="submit" name="submit" value="Submit">
      </fieldset>
    </form><br>

    <?php if( $spam == true ) echo '<h3>Please Try Again</h3>'; ?>
    <?php if( $posted == true ) echo '<h3>Thanks for your entry</h3>'; ?>
    <?php
    echo '<div>';
    foreach( $entries as $entry ) {
      $url = site_url("guestbook/delete/".$entry['id']);

      echo '<div id="comment-box"><p><strong>Posted by: </strong><span>'.$entry['name'].'</p></span><strong>On: </strong>'.$entry['posted_on'].'</p><p>'.$entry['comment'].'&nbsp &nbsp&nbsp &nbsp
        <p><a href="'.$url.'"><button id="delete">Delete</button></a></p></li></ul></div><br>';
    }
    echo '</div>';
    ?>
  </body>
</html>






