@extends('_master')

@section('title')
Random User Generator
@stop

@section('includes')
<link rel='stylesheet' href="style.css" type='text/css'>
<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
@stop

@section('content')


<p style="margin:0in;font-family:Broadway;font-size:33.0pt">
                        User Generator</p>

        {{ Form::open(array('url' => '/randomusers')) }}   
        <table cellpadding="10">
            <tr>
                <td align="left">How Many Users? &nbsp</td>
                <td>{{ Form::text('users', '5', array('style' => 'width:20px', 'class'=> 'username-field', 'required' => 'required', 'autofocus' => 'autofocus' )) }} 
                	(Max 99)</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Include:</td>
                
            </tr>
            <tr>
                <td align="left">
                	{{ Form::checkbox('birthdate', 'yes' ) }} Birthdate <br />
                	{{ Form::checkbox('profile', 'yes' ) }} Profile 
                </td>
            </tr>
            <tr>
                <td colspan="2">
                	<br>
                    {{ Form::submit('Generate!', array('class' => 'myButton')) }} 
                </td>
            </tr>

        </table>

        {{ Form::close() }}
        <div style="width:700px; text-align:left">
            {{ $randomusers }}
        </div>
@stop

