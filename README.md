# nette-analytics
Google analytics


# google analytics
analytics:
    parameters:
#        productionMode: true
#        async: true
        ga: 'UA-XXXXX-Y'
#       ga:
#           cs: 'UA-XXXXX-Y'
        gtm: 'GTM-XXXXXXX'
#       gtm:
#           cs: 'GTM-XXXXXXX'


extensions:
	analytics: Analytics\Bridges\Nette\Extension

