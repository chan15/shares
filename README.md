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
        <a href="http://www.espn.com/" data-shares="pinterest">ESPN to Pinterest</a>
        <span></span>
    </div>
</body>
</html>
```

### Customize CSS

![](https://lh6.googleusercontent.com/-iUu0XBcRUjI/UzOt8cAxzjI/AAAAAAAA89s/wBJfrb1gNEM/s473/shares_result.png)
