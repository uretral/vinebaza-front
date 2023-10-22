
@vite(['resources/assets/less/app.less', 'resources/assets/js/app.js'])

    <parser-container :donors='{{$donors}}'/>



{{--<parser-container :donors='".$donors."'/>--}}
@livewireScriptConfig


{{--
public function content($pageNr): string
{
try {
Artisan::call('winstyle:catalog', ['page' => $pageNr]);
return Artisan::output();
} catch (\Exception $e) {
dd($e);
}
//        return file_get_contents(base_path('html3.txt'));

}

--}}
