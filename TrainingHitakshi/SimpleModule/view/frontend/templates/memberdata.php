<?php

/**
 * @var \TrainingHitakshi\SimpleModule\Block\Display $block
 */

?>

<style>
table {  font-family: arial, sans-serif;  border-collapse: collapse;  width: 100%;  margin-top: 30px;}
td, th {  border: 1px solid #dddddd;  text-align: left;  padding: 8px;  }
tr:nth-child(even) { background-color: #dddddd; }
.post-id{width:2%} .post-name{width:30%}

</style>

<table>
  <tr>
    <th class="post-id">Id</th>
    <th class="post-name">Name</th>
    <th>Content</th>
  </tr>
    <?php
        // foreach ($block->getMemberCollection() as $key=>$post){
        //     echo '<tr>
        //             <td>'.$post->getPostId().'</td>
        //             <td>'.$post->getName().'</td>
        //             <td>'.$post->getPostContent().'</td>
        //           </tr>';
        // }
    ?>
</table>

</body>
</html>