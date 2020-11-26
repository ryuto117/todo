<?

//フォーム入力された時のエラーの処理
  public function post(Request $request)
    {
        $rules = [
            'name' =>'required',
            'mail' =>'email',
            'age' =>'numeric|between:0,150',
        ];
        $message =[
            'name.required' =>'名前は必ず入力して下さい。',
            'mail.email' =>'メールアドレスが必要です。',
            'age.numeric' =>'年齢を整数で記入して下さい。',
            'age.between' =>'年齢は0〜150の間で入力下さい。',
        ];
        $validator = Validator::make($request->all(),$rules,$message);
        if($validator->fails()){
            return redirect('/hello')
                ->withErrors($validator)
                ->withInput();
        }
        return view('hello.index',['msg'=>'正しく入力されました！']);
    }


//条件付きエラーの処理
    public function post(Request $request)
    {
        $rules = [
            'name' =>'required',
            'mail' =>'email',
            'age' =>'numeric',
        ];
        $message =[
            'name.required' =>'名前は必ず入力して下さい。',
            'mail.email' =>'メールアドレスが必要です。',
            'age.numeric' =>'年齢を整数で記入して下さい。',
            'age.min' =>'年齢はゼロ以上で記入して下さい。',
            'age.max' =>'年齢は200歳以下で入力下さい。',
        ];
        $validator = Validator::make($request->all(),$rules,$message);

        //ここが条件付きエラーの処理（この場合、整数が入力されているとこれが動く）
        $validator->sometimes('age','min:0',function($input){
            return !is_int($input->age);
        });
        $validator->sometimes('age','max:200',function($input){
            return !is_int($input->age);
        });
?>
