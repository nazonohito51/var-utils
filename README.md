# VarUtils
## Usage
```php
$city  = "San Francisco";
$state = "CA";
$event = "SIGGRAPH";

$location_vars = array("city", "state");

// compatible: compact("event", "nothing_here", $location_vars);
$result = Vars::compact(get_defined_vars(), "event", "nothing_here", $location_vars);
print_r($result);

/*
Array
(
    [event] => SIGGRAPH
    [city] => San Francisco
    [state] => CA
)
*/
```
