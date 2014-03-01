<?php
header('Content-Type: text/html; charset=utf-8');
?>
<h1>heroku test merge</h1>
<script type="text/javascript" src="todo.js"></script>
<?php
echo '<p>Текущие дата и время - <b>' . date('m.d.Y H:i:s') . '</b></p>';
phpinfo();
?>