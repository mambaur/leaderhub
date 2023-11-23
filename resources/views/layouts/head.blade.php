<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet" />

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="shortcut icon" href="{{ url('/') }}/admin-assets/images/leaderhub/mini-logo.png" />


<link rel="stylesheet" href="{{ url('/') }}/admin-assets/css/jquery/jquery-ui.theme.min.css" />
<link rel="stylesheet" href="{{ url('/') }}/admin-assets/css/jquery/jquery-ui.min.css" />

<title>{{ @$title ?? get_company_name() }}</title>

<style>
    .page-item.active .page-link {
        background-color: #00CCD9;
        border-color: #00CCD9;
    }

    .page-link {
        color: #00CCD9;
    }

    .ui-autocomplete {
        z-index: 9999999 !important;
    }

    .ui-autocomplete-loading {
        background: url(http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/images/ui-anim_basic_16x16.gif) no-repeat right center
    }
</style>
