
<img src="{{ asset('main/lmdn_logo_500.png') }}" width="100">

<h3>Application Receipt</h3>
<h3>Application Id: {{ $application_id }}</h3>

<p>
    <strong>Details of your application</strong><br><br>

    <strong>Full Name:</strong> {{ $surname }} {{ $other_names }}<br>

    <strong>Age:</strong> {{ $age }}<br>

    <strong>Nationality:</strong> {{ $country }}<br>

    <strong>State:</strong> {{ $state }}<br>

    <strong>City:</strong> {{ $city }}<br>

    <strong>Vital State:</strong> {{ $vital_state }}<br>

    <strong>School Name:</strong> {{ $school_name }}<br>

    <strong>School Class:</strong> {{ $school_class }}<br>

    <strong>Height:</strong> {{ $height }}<br>

    <strong>Bust:</strong> {{ $bust }}<br>

    <strong>Waist:</strong> {{ $waist }}<br>

    <strong>Hips:</strong> {{ $hips }}<br>

    <strong>Parent Names:</strong> {{ $parent_surname }} {{ $parent_other_names }}<br>

    <strong>Parent Mobile:</strong> {{ $parent_mobile }}<br>

    <strong>Parent Email:</strong> {{ $parent_email }}<br>

</p>
