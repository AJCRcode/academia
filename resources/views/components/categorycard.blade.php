@props(['background'=>'bg-blue-100','content'=>'text-blue-800','darkbackground'=>'dark:bg-gray-700','darkcontent'=>'dark:text-blue-400','uri'=>'#'])
<a href="{{$uri}}" class="{{$background}} {{$content}} text-base font-semibold font-medium inline-flex items-center px-2.5 py-0.5 rounded-md {{$darkbackground}} {{$darkcontent}} mb-2">
    {{$contenido}}
</a>
