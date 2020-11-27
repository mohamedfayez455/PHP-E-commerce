<?php



if (! function_exists('active()')) {
    function active($key , $segment){

        return Request::segment($segment) == $key ? 'active' : '';
    }

};
if (! function_exists('load_department()')){
    function load_department($select = null , $dep_hide =null){
        $departments =\Modules\Departments\Entities\Department::selectRaw('name as text')->selectRaw('id as id')
            ->selectRaw('parent_id as parent')->get(['text' , 'id' , 'parent']);
        $all_departments = [];
        foreach ($departments as $department)
        {
            $select_array = [];
            $select_array['photo'] = '';
            $select_array['la_attr'] = '';
            $select_array['a_attr'] = '';
            $select_array['children'] = '';
            if ($select !== null && $select== $department->id)
            {
            $select_array['state'] = [
                'opened' => true,
                'selected' => true,
                'disabled' => false,
                ];
            }
            if ($dep_hide !== null && $dep_hide== $department->id)
            {
            $select_array['state'] = [
                'opened' => false,
                'selected' => false,
                'disabled' => true,
                'hidden' => true,
                ];
            }
            $select_array['text']   = $department->text;
            $select_array['id']     = $department->id;
            $select_array['parent'] = $department->parent !== null ? $department->parent : "#";

            array_push($all_departments , $select_array);
        }

        return json_encode($all_departments , JSON_UNESCAPED_UNICODE);
    }
}





