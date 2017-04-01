@component('mail::message')
# Introduction

欢迎加入我的一家，这里有我擦擦我擦擦， 你值得拥有！！！

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
