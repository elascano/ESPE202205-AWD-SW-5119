// WidgetKey can be obtained from your account 
var widgetKey = 'e6aee87e4961ab70ecafa1c753fe88ab3fcf6603357f0044a7b63efed062a52e';
// Store widgetKey in sessionStorage
sessionStorage.setItem('widgetKey', widgetKey);

// Function that prevent click to acces link href
function windowPreventOpening() {
    $(this).click(function(event) {
        event.preventDefault();
    });
}

// Function that comapare times
function naturalCompare(a, b) {
    var ax = [],
        bx = [];

    a['time'].replace(/(\d+)|(\D+)/g, function(_, $1, $2) {
        ax.push([$1 || Infinity, $2 || ""])
    });
    b['time'].replace(/(\d+)|(\D+)/g, function(_, $1, $2) {
        bx.push([$1 || Infinity, $2 || ""])
    });

    while (ax.length && bx.length) {
        var an = ax.shift();
        var bn = bx.shift();
        var nn = (an[0] - bn[0]) || an[1].localeCompare(bn[1]);
        if (nn) return nn;
    }

    return ax.length - bx.length;
}

// Function that sort ascendent by league round
function groupSortingAsc(a, b) {
    var ax = [],
        bx = [];

    a['league_round'].replace(/(\d+)|(\D+)/g, function(_, $1, $2) {
        ax.push([$1 || Infinity, $2 || ""])
    });
    b['league_round'].replace(/(\d+)|(\D+)/g, function(_, $1, $2) {
        bx.push([$1 || Infinity, $2 || ""])
    });

    while (ax.length && bx.length) {
        var an = ax.shift();
        var bn = bx.shift();
        var nn = (an[0] - bn[0]) || an[1].localeCompare(bn[1]);
        if (nn) return nn;
    }

    return ax.length - bx.length;
}

// Function that group by
var groupBy = function(xs, key) {
    return xs.reduce(function(rv, x) {
        (rv[x[key]] = rv[x[key]] || []).push(x);
        return rv;
    }, {});
};

// Function that sort by key
function sortByKey(array, key) {
    return array.sort(function(a, b) {
        var x = a[key];
        var y = b[key];
        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
    });
}

// Function that get server time
var timeForFixtures = '';

var fiTFF = setInterval(function() {

    if (typeof getTimeZone() != 'undefined') {
        $.ajax({
            url: 'https://apiv2.allsportsapi.com/football/',
            cache: false,
            data: {
                met: 'Date',
                widgetKey: widgetKey,
                timezone: getTimeZone()
            },
            dataType: 'json'
        }).done(function(res) {

            var formattedDate = new Date(res.result.datetime  + "T00:00");
            var d = formattedDate.getDate();
            var m = formattedDate.getMonth() + 1;
            var y = formattedDate.getFullYear();
            timeForFixtures = y + '-' + (m < 10 ? '0' + m : m) + '-' + (d < 10 ? '0' + d : d);

        }).fail(function(error) {

        });
        clearInterval(fiTFF);
    }
}, 10);

// Function that get local time
function getTimeZone() {
    var offset = new Date().getTimezoneOffset(),
        o = Math.abs(offset);
    return (offset < 0 ? "+" : "-") + ("00" + Math.floor(o / 60)).slice(-2) + ":" + ("00" + (o % 60)).slice(-2);
}