<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Premier league table</title>
	<link rel="shortcut icon" type="image/png" href="favicon-32x32.png"/>
	<link rel="stylesheet" type="text/css" href="widgetStandings.css">
	<script src="jquery.js"></script>
	<script src="jqueryGlobals.js"></script>
    <script src="jquery.widgetStandings.js" type="text/javascript"></script>
</head>
<body>
	<section id="widgetStandings"></section>
</body>

<script type="text/javascript">

	$(document).ready(function() {
	 	$('#widgetStandings').widgetStandings({
			leagueId: '152',
			leagueName: 'Premier League',
			leagueLogo: 'https://apiv2.allsportsapi.com/logo/logo_leagues/152_premier-league.png',
			widgetWidth: '100%'
        });
	});

</script>
</html>