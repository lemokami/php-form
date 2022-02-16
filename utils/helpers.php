<?php


/**
 * sanitizes the user input
 * @param $data
 * @return string
 */
function sanitize($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
