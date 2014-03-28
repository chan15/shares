(function($) {
    $.fn.shares = function(options) {
        var params = {
                counts: '',
            },
            set = $.fn.extend(params, options),
            shareUrls = [],
            countable = [];

        countable = [
            'facebook',
            'twitter',
            'google',
            'pinterest'
        ];
        shareUrls = [
            {'name': 'facebook', 'url': 'http://www.facebook.com/sharer.php?u='},
            {'name': 'twitter', 'url': 'http://twitter.com/share?url='},
            {'name': 'google', 'url': 'https://plus.google.com/share?url='},
            {'name': 'pinterest', 'url': 'http://pinterest.com/pin/create/button/?url='},
        ];

        return this.each(function(options) {
            var type = $(this).attr('data-shares'),
                url = $(this).prop('href'),
                image = $(this).attr('data-image'),
                shareUrl = '',
                width = 500,
                height = 360,
                left = ($(window).width() - width) / 2,
                top = ($(window).height() - height) / 2,
                btn = $(this);

            $.each(shareUrls, function(key, item) {
                if (type === item.name) {
                    shareUrl = item.url + encodeURI(url);

                    switch (type) {
                        case 'pinterest':
                            if (undefined !== image) {
                                shareUrl += '&media=' + image;
                            }
                            break;
                    }

                    btn.on('click', function() {
                        window.open(shareUrl, '', 'width=' + width + ', height=' + height + ', left=' + left + ', top=' + top);

                        return false;
                    });

                    if ('' !== set.counts && -1 !== $.inArray(type, countable)) {
                        $.get('api-shares.php', {type: type, url: url}, function(response) {
                            set.counts.text(response);
                        });
                    }

                    return false
                }
            });
        });
    }
}(jQuery));
