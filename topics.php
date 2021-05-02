<?php require('core/init.php'); ?>
<?php 
//Create Objects
$user = new User;
$topic = new Topic;

//Get Template and Assign Vars
$template = new Template('templates/frontpage.php');

//Get Category id from url
$category = $user_id = isset($_GET['category']) ? ((int) filter_var($_GET['category'],FILTER_SANITIZE_NUMBER_INT)):null;
//Get User id from url
$user_id = $user_id = isset($_GET['user']) ? ((int) filter_var($_GET['user'],FILTER_SANITIZE_NUMBER_INT)):null;

//Assign Variables to template object

$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();

if (isset($category)){
    $template->topics = $topic->getByCategory($category);
    $template->title = 'Posts in "'.$topic->getCategory($category)['name'].'"';
} 
if (isset($user_id)){
    $template->topics = $topic->getByUser($user_id);
    $template->title = 'Posts by "'. $topic -> getUser($user_id)['name'].'"';
} 

if (!isset($category) && !isset($user_id)) {
    $template->topics = $topic->getAllTopics();
}

//Display template
echo $template;

?>