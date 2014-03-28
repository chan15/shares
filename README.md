shares
======

jQuery Share Plugin

### Sample
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shares</title>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="js/jquery.shares.js"></script>
    <script>
    $(function() {
            $('a').each(function() {
                $(this).shares({
                    counts: $(this).next()
                });
            });
    });
    </script>
</head>
<body>
    <div>
        <a href="http://www.nba.com" data-shares="facebook">NBA to Facebook</a>
        <span></span>
    </div>
    <div>
        <a href="http://www.ebay.com/" data-shares="twitter">eBay to Twitter</a>
        <span></span>
    </div>
    <div>
        <a href="http://www.bestbuy.com/" data-shares="google">Bestbuy to Google Plus</a>
        <span></span>
    </div>
    <div>
        <a href="http://www.espn.com/" data-shares="pinterest" data-image="http://a.espncdn.com/photo/2014/0327/nfl_divisional1_288x75.jpg">ESPN to Pinterest</a>
        <span></span>
    </div>
</body>
</html>
```

### Properties

- `data-shares` - social network type
- `data-image` - default image, only for Pinterest now

### Options
- `counts` - this is the share count number request option, if the api has service, it will apear the number in the target you ask

### What We Have Now

- Facebook
- Twiiter
- Google Plus
- Pinterest

### Customize CSS

![](https://lh6.googleusercontent.com/-iUu0XBcRUjI/UzOt8cAxzjI/AAAAAAAA89s/wBJfrb1gNEM/s473/shares_result.png)
