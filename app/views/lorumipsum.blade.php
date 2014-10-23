@extends('_master')

@section('title')
Lorem Ipsum Generator
@stop

@section('includes')
<link rel='stylesheet' href="style.css" type='text/css'>
<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
@stop

@section('content')
 <p style="margin:0in;font-family:Broadway;font-size:33.0pt">
                        Lorem Ipsum Generator</p>
         <Br>

     {{ Form::open(array('url' => '/lorumipsum')) }}   
        <table cellpadding="20">
            <tr>
                <td align="left" colspan="2">How Many Paragraphs do you want?</td>
            </tr>
            <tr>
                <td align="left">{{ Form::label('first_name', 'Paragraphs:') }}</td>
                <td>
                	<!--<input style="width:20px" type="text" /> -->
                	
                    {{ Form::text('paragraphs', '5', array('style' => 'width:20px', 'class'=> 'username-field', 'required' => 'required', 'autofocus' => 'autofocus' )) }} 
                	(Max 99)
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    {{ Form::submit('Generate!', array('class' => 'myButton')) }} 
                </td>
            </tr>
        </table> 
        <br><br>
        {{ Form::close() }}
        <div style="width:700px; text-align:left">
            {{ $ipsumtext }}
        </div>
@stop

