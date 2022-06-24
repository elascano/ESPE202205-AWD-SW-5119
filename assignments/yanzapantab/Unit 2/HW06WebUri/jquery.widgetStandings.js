// ---------------------------------
// ---------- widgetStandings ----------
// ---------------------------------
// Widget for League Display
// ------------------------
;
(function($, window, document, undefined) {

    var widgetStandings = 'widgetStandings';

    function Plugin(element, options) {
        this.element = element;
        this._name = widgetStandings;
        this._defaults = $.fn.widgetStandings.defaults;
        this.options = $.extend({}, this._defaults, options);

        this.init();
    }

    $.extend(Plugin.prototype, {

        // Initialization logic
        init: function() {
            this.buildCache();
            this.bindEvents();
            this.initialContent(this.options.leagueDetailsAjaxURL, this.options.leagueId, this.options.widgetKey, this.options.leagueName, this.options.leagueLogo, this.options.timezone);
        },

        // Remove plugin instance completely
        destroy: function() {
            this.unbindEvents();
            this.$element.removeData();
        },

        // Cache DOM nodes for performance
        buildCache: function() {
            this.$element = $(this.element);
        },

        // Bind events that trigger methods
        bindEvents: function() {
            var plugin = this;
        },

        // Unbind events that trigger methods
        unbindEvents: function() {
            this.$element.off('.' + this._name);
        },

        initialContent: function(leagueDetailsAjaxURL, leagueId, widgetKey, leagueName, leagueLogo, timezone) {

            // Get widget location
            var leagueLocation = $(this.element);
            // Adding loading screen
            $('<div class="loading">Loading&#8230;</div>').prependTo($(leagueLocation));
            // Construct the Standings Tab click
            $('<a href="#standingsTabC" onclick="windowPreventOpening()" class="titleWidget nav-tab nav-tab-active">Standings</a>').prependTo($(leagueLocation));
            // Construct the header for above tabs with logo and name of league
            $('<div class="leagueNameCon"><div class="leagueNameImg" style="background-image: url(\'' + (((leagueLogo == '') || (leagueLogo == 'null') || (leagueLogo == 'https://apiv2.allsportsapi.com/logo/logo_leagues/-1')) ? 'img/no-img.png' : leagueLogo) + '\');"></div><p class="leagueName">' + leagueName + '</p></div>').prependTo($(leagueLocation));

            // Adding the "widgetStandings" class for styling and easyer targeting
            leagueLocation.addClass('widgetStandings');

            // If backgroundColor setting is set, here we activate the color 
            if (this.options.backgroundColor) {
                leagueLocation.css('background-color', this.options.backgroundColor);
            }

            // If widgetWidth setting is set, here we set the width of the list 
            if (this.options.widgetWidth) {
                leagueLocation.css('width', this.options.widgetWidth);
            }

            // Add hook in HTML for Standings Tab content infos
            var htmlConstructor = '<div id="standingsTabC" class="standing-nav-tab-wrapper tab-content active">';
            // Add HTML hook for standings tab content
            htmlConstructor += '<div class="nav-tab-wrapper">';
            var htmlTabsConstructor = '';
            var htmlInsideTabsConstructor = '';
            var firstElementInJson = 0;
            // Make call to server to get information about league standings
            $.ajax({
                url: leagueDetailsAjaxURL,
                cache: false,
                data: {
                    met: 'Standings',
                    widgetKey: widgetKey,
                    leagueId: leagueId
                },
                dataType: 'json'
            }).done(function(res) {

                // If server send data, hide loading sreen
                $('.loading').hide();

                // If server send results we populate HTML with sended information
                $.each(res.result, function(key, value) {
                    // Order information ascendent, then group them by League Round
                    res.result[key].sort(groupSortingAsc);
                    var groubedByTeam = groupBy(res.result[key], 'league_round');
                    // Making first tab active
                    if (firstElementInJson == 0) {
                        htmlConstructor += '<a href="#' + key + '" class="standing-h2 nav-tab nav-tab-active">' + key + '</a>';
                        htmlInsideTabsConstructor += '<section id="' + key + '" class="tab-content active">';
                        htmlInsideTabsConstructor += '<div class="tablele-container">';
                        if ($.isEmptyObject(groubedByTeam)) {
                            htmlInsideTabsConstructor += '<div class="flex-table header" role="rowgroup">';
                            htmlInsideTabsConstructor += '<div title="Rank" class="flex-row first fix-width" role="columnheader">#</div>';
                            htmlInsideTabsConstructor += '<div title="Team" class="flex-row teams" role="columnheader">Team</div>';
                            htmlInsideTabsConstructor += '<div title="Matches Played" class="flex-row fix-width" role="columnheader">MP</div>';
                            htmlInsideTabsConstructor += '<div title="Wins" class="flex-row fix-width" role="columnheader">W</div>';
                            htmlInsideTabsConstructor += '<div title="Draws" class="flex-row fix-width" role="columnheader">D</div>';
                            htmlInsideTabsConstructor += '<div title="Losses" class="flex-row fix-width" role="columnheader">L</div>';
                            htmlInsideTabsConstructor += '<div title="Goals" class="flex-row goals" role="columnheader">G</div>';
                            htmlInsideTabsConstructor += '<div title="Points" class="flex-row fix-width" role="columnheader">Pts</div>';
                            htmlInsideTabsConstructor += '</div>';
                            htmlInsideTabsConstructor += '<div class="table__body">';
                            htmlInsideTabsConstructor += '<div class="flex-table-error row" role="rowgroup">';
                            htmlInsideTabsConstructor += '<p class="" style="border-left: solid 0px transparent; margin-left:auto; margin-right:auto; margin-top: 5px;">Sorry, no data!</p>';
                            htmlInsideTabsConstructor += '</div>';
                            htmlInsideTabsConstructor += '</div>';
                        }
                        $.each(groubedByTeam, function(keyss, valuess) {
                            htmlInsideTabsConstructor += '<div class="flex-table header">';
                            htmlInsideTabsConstructor += '<div title="Rank" class="flex-row first fix-width" role="columnheader">#</div>';
                            htmlInsideTabsConstructor += '<div title="' + ((!keyss) ? "Team" : keyss) + '" class="flex-row teams" role="columnheader"><span class="standingsTeamsSpan">' + ((!keyss) ? "Team" : keyss) + '</span></div>';
                            htmlInsideTabsConstructor += '<div title="Matches Played" class="flex-row fix-width" role="columnheader">MP</div>';
                            htmlInsideTabsConstructor += '<div title="Wins" class="flex-row fix-width" role="columnheader">W</div>';
                            htmlInsideTabsConstructor += '<div title="Draws" class="flex-row fix-width" role="columnheader">D</div>';
                            htmlInsideTabsConstructor += '<div title="Losses" class="flex-row fix-width" role="columnheader">L</div>';
                            htmlInsideTabsConstructor += '<div title="Goals" class="flex-row goals" role="columnheader">G</div>';
                            htmlInsideTabsConstructor += '<div title="Points" class="flex-row fix-width" role="columnheader">Pts</div>';
                            htmlInsideTabsConstructor += '</div>';
                            htmlInsideTabsConstructor += '<div class="table__body">';
                            var colorForStanding = ['colorOne', 'colorTwo', 'colorThree', 'colorFour', 'colorFive', 'colorSix', 'colorSeven', 'colorEight', 'colorNine', 'colorTen'];
                            var colorStringValue = -1;
                            var stringToCompareStandings = '';
                            $.each(valuess, function(keys, values) {
                                htmlInsideTabsConstructor += '<div class="flex-table row" role="rowgroup">';
                                if (values.standing_place_type) {
                                    if (stringToCompareStandings != values.standing_place_type) {
                                        stringToCompareStandings = values.standing_place_type;
                                        colorStringValue++;
                                        colorForStanding[colorStringValue];
                                        htmlInsideTabsConstructor += '<div class="flex-row first-sticky fix-width ' + colorForStanding[colorStringValue] + '" title="' + values.standing_place_type + '" role="cell">' + values.standing_place + '.</div>';
                                    } else if (stringToCompareStandings == values.standing_place_type) {
                                        colorForStanding[colorStringValue];
                                        htmlInsideTabsConstructor += '<div class="flex-row first-sticky fix-width ' + colorForStanding[colorStringValue] + '" title="' + values.standing_place_type + '" role="cell">' + values.standing_place + '.</div>';
                                    }
                                } else if (!values.standing_place_type) {
                                    colorStringValue = $(colorForStanding).length / 2;
                                    htmlInsideTabsConstructor += '<div class="flex-row first-sticky fix-width" role="cell">' + values.standing_place + '.</div>';
                                }
                                htmlInsideTabsConstructor += '<div class="flex-row teams" role="cell"><a href="#" onclick="windowPreventOpening()">' + values.standing_team + '</a></div>';
                                htmlInsideTabsConstructor += '<div class="flex-row fix-width" role="cell">' + values.standing_P + '</div>';
                                htmlInsideTabsConstructor += '<div class="flex-row fix-width" role="cell">' + values.standing_W + '</div>';
                                htmlInsideTabsConstructor += '<div class="flex-row fix-width" role="cell">' + values.standing_D + '</div>';
                                htmlInsideTabsConstructor += '<div class="flex-row fix-width" role="cell">' + values.standing_L + '</div>';
                                htmlInsideTabsConstructor += '<div class="flex-row goals" role="cell">' + values.standing_F + ':' + values.standing_A + '</div>';
                                htmlInsideTabsConstructor += '<div class="flex-row fix-width" role="cell">' + values.standing_PTS + '</div>';
                                htmlInsideTabsConstructor += '</div>';
                            });
                            htmlInsideTabsConstructor += '</div>';
                        });
                        htmlInsideTabsConstructor += '</div>';
                        htmlInsideTabsConstructor += '</section>';
                        firstElementInJson++
                    } else {
                        htmlConstructor += '<a href="#' + key + '" class="standing-h2 nav-tab">' + key + '</a>';
                        htmlInsideTabsConstructor += '<section id="' + key + '" class="tab-content">';
                        htmlInsideTabsConstructor += '<div class="tablele-container">';
                        if ($.isEmptyObject(groubedByTeam)) {
                            htmlInsideTabsConstructor += '<div class="flex-table header" role="rowgroup">';
                            htmlInsideTabsConstructor += '<div title="Rank" class="flex-row first fix-width" role="columnheader">#</div>';
                            htmlInsideTabsConstructor += '<div title="Team" class="flex-row teams" role="columnheader">Team</div>';
                            htmlInsideTabsConstructor += '<div title="Matches Played" class="flex-row fix-width" role="columnheader">MP</div>';
                            htmlInsideTabsConstructor += '<div title="Wins" class="flex-row fix-width" role="columnheader">W</div>';
                            htmlInsideTabsConstructor += '<div title="Draws" class="flex-row fix-width" role="columnheader">D</div>';
                            htmlInsideTabsConstructor += '<div title="Losses" class="flex-row fix-width" role="columnheader">L</div>';
                            htmlInsideTabsConstructor += '<div title="Goals" class="flex-row goals" role="columnheader">G</div>';
                            htmlInsideTabsConstructor += '<div title="Points" class="flex-row fix-width" role="columnheader">Pts</div>';
                            htmlInsideTabsConstructor += '</div>';
                            htmlInsideTabsConstructor += '<div class="table__body">';
                            htmlInsideTabsConstructor += '<div class="flex-table-error row" role="rowgroup">';
                            htmlInsideTabsConstructor += '<p class="" style="border-left: solid 0px transparent; margin-left:auto; margin-right:auto; margin-top: 5px;">Sorry, no data!</p>';
                            htmlInsideTabsConstructor += '</div>';
                            htmlInsideTabsConstructor += '</div>';
                        }
                        $.each(groubedByTeam, function(keyss, valuess) {
                            htmlInsideTabsConstructor += '<div class="flex-table header">';
                            htmlInsideTabsConstructor += '<div title="Rank" class="flex-row first fix-width" role="columnheader">#</div>';
                            htmlInsideTabsConstructor += '<div title="' + ((!keyss) ? "Team" : keyss) + '" class="flex-row teams" role="columnheader">' + ((!keyss) ? "Team" : keyss) + '</div>';
                            htmlInsideTabsConstructor += '<div title="Matches Played" class="flex-row fix-width" role="columnheader">MP</div>';
                            htmlInsideTabsConstructor += '<div title="Wins" class="flex-row fix-width" role="columnheader">W</div>';
                            htmlInsideTabsConstructor += '<div title="Draws" class="flex-row fix-width" role="columnheader">D</div>';
                            htmlInsideTabsConstructor += '<div title="Losses" class="flex-row fix-width" role="columnheader">L</div>';
                            htmlInsideTabsConstructor += '<div title="Goals" class="flex-row goals" role="columnheader">G</div>';
                            htmlInsideTabsConstructor += '<div title="Points" class="flex-row fix-width" role="columnheader">Pts</div>';
                            htmlInsideTabsConstructor += '</div>';
                            htmlInsideTabsConstructor += '<div class="table__body">';
                            $.each(valuess, function(keys, values) {
                                htmlInsideTabsConstructor += '<div class="flex-table row" role="rowgroup">';
                                htmlInsideTabsConstructor += '<div class="flex-row first fix-width" role="cell">' + values.standing_place + '.</div>';
                                htmlInsideTabsConstructor += '<div class="flex-row teams" role="cell"><a href="#" onclick="windowPreventOpening()">' + values.standing_team + '</a></div>';
                                htmlInsideTabsConstructor += '<div class="flex-row fix-width" role="cell">' + values.standing_P + '</div>';
                                htmlInsideTabsConstructor += '<div class="flex-row fix-width" role="cell">' + values.standing_W + '</div>';
                                htmlInsideTabsConstructor += '<div class="flex-row fix-width" role="cell">' + values.standing_D + '</div>';
                                htmlInsideTabsConstructor += '<div class="flex-row fix-width" role="cell">' + values.standing_L + '</div>';
                                htmlInsideTabsConstructor += '<div class="flex-row goals" role="cell">' + values.standing_F + ':' + values.standing_A + '</div>';
                                htmlInsideTabsConstructor += '<div class="flex-row fix-width" role="cell">' + values.standing_PTS + '</div>';
                                htmlInsideTabsConstructor += '</div>';
                            });
                            htmlInsideTabsConstructor += '</div>';
                        });
                        htmlInsideTabsConstructor += '</div>';
                        htmlInsideTabsConstructor += '</section>';
                    }
                });
                htmlConstructor += '</div>';
                htmlConstructor += '</div>';
                // Adding all above data to league location in HTML
                $(leagueLocation).append(htmlConstructor);

                // Switching tabs on click
                $('.widgetStandings .nav-tab').unbind('click').on('click', function(e) {
                    e.preventDefault();
                    //Toggle tab link
                    $(this).addClass('nav-tab-active').siblings().removeClass('nav-tab-active');
                    //Toggle target tab
                    $($(this).attr('href')).addClass('active').siblings().removeClass('active');
                });
                $('.widgetStandings .standing-nav-tab-wrapper .nav-tab-wrapper').after(htmlInsideTabsConstructor);
                $('.widgetStandings .standing-nav-tab-wrapper .nav-tab').unbind('click').on('click', function(e) {
                    e.preventDefault();
                    //Toggle tab link
                    $(this).addClass('nav-tab-active').siblings().removeClass('nav-tab-active');
                    //Toggle target tab
                    $($(this).attr('href')).addClass('active').siblings().removeClass('active');
                });
            }).fail(function(error) {

            });
        },

        callback: function() {

        }

    });

    $.fn.widgetStandings = function(options) {
        this.each(function() {
            if (!$.data(this, "plugin_" + widgetStandings)) {
                $.data(this, "plugin_" + widgetStandings, new Plugin(this, options));
            }
        });
        return this;
    };

    $.fn.widgetStandings.defaults = {
        // WidgetKey will be set in jqueryGlobals.js and can be obtained from your account
        widgetKey: widgetKey,
        // Link to server data
        leagueDetailsAjaxURL: 'https://apiv2.allsportsapi.com/football/',
        // Get Leagues information, name and image (reuqested automaticaly from server when you click on a league from country list)
        leagueId: null,
        leagueName: null,
        leagueLogo: null,
        // Background color for your Leagues Widget
        backgroundColor: null,
        // Width for your Countries Widget
        widgetWidth: null,
        // Get the time zone of your location
        timezone: getTimeZone()
    };

})(jQuery, window, document);