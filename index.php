<?php
	//echo 'This is php';


for ($i=1;$i<=9;$i++){
	for ($j=1;$j<=$i;$j++){
		echo $i.'x'.$j.'='.$i*$j.'&nbsp;&nbsp;';
	}
	echo '<br>';
}

?>
<hr>
<?php
	for ($i=9;$i>=1;$i--){
		for ($j=$i;$j>=1;$j--){
			echo $i.'x'.$j.'='.$i*$j.'&nbsp;&nbsp;';
		}
		echo '<br>';
	}
?>
<hr>
<?php
	echo '<table border="1" align="center" width="90%">';
	for ($j=0;$j<10;$j++){
		if ($j%2==0){
			$bg='#ffffff';
		}else{
			$bg='#cccccc';
		}
		echo '<tr bgcolor='.$bg.'>';
		for ($i=0;$i<10;$i++){
			echo '<td>'.($j*10+$i).'</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
?>


<hr>
回调函数<br>
<?php
function demo($num){
	echo $num.'<br>';	//10,9,8,7,6,5,4,3,2,1,0
	
	if($num>0){
		demo($num-1);
	}else{
		echo '----------------------<br>';
	}
	
	echo $num.'<br>';	//0,1,2,3,4,5,6,7,8,9,10
}
demo(10);
?>

<hr>
<?php
	function total($dirname,&$dirnum,&$filenum){
		$dir=opendir($dirname);
		readdir($dir).'<br>';
		readdir($dir).'<br>';
		
		while($filename=readdir($dir)){
			$newfile=$dirname.'/'.$filename;
			
			if(is_dir($newfile)){
				total($newfile,$dirnum,$filenum);
				$dirnum++;
			}else{
				$filenum++;
			}
		}
		
		closedir($dir);
	}
	
	$dirnum=0;
	$filenum=0;

	total('/Users/china-diaoyuisland/Documents/LAMP/',$dirnum,$filenum);
	echo '/Users/china-diaoyuisland/Documents/LAMP/<br>';
	echo '目录总数：'.$dirnum.'<br>';
	echo '文件总数：'.$filenum.'<br>';
	
	
?>

<hr>
<?php
	$user=array(1,"name"=>"zhangsan","age"=>40,"sex"=>"man","aaa@bbb.com");
	
	foreach($user as $key=>$val){
		echo $key.'====='.$val.'<br>';
	}
	
	
	$info=array(
				'user'=>array(
							array(1,'zhangsan',10,'man'),
							array(2,'lisi',20,'girl'),
							array(3,'wangwu',40,'man')
				),
				'score'=>array(
							array(1,100,90,80),
							array(2,99,88,77),
							array(3,10,40,89)
				),
				'connect'=>array(
							array(1,'110','aaa@bbb.com'),
							array(2,'119','bbb@ccc.com'),
							array(3,'120','ccc@ddd.com')
				)
	);
	
	foreach($info as $tableName=>$table){
		echo '<table align="center" width="80%" border="1">';
		echo '<caption><h1>'.$tableName.'</h1></caption>';
		foreach($table as $row){
			echo '<tr>';
				foreach($row as $col){
					echo '<td>'.$col.'</td>';
				}
			echo '</tr>';
		}
		echo '</table>';
	}
	
	
	$user=array("id"=>1,"name"=>"zhangsan","age"=>30,"sex"=>"man");
	
	//each()函数，传入数组，返回一个数组，返回数组是 0 ，1 ，key，value 四个下标
	// 默认当前元素就是第一个元素，每执行一次，指针就会往后移动一次，如果移动到最后，返回false
	while($arr=each($user)){
		//echo $arr[0].'=====>'.$arr[1].'<br>';
		echo $arr["key"].'----->'.$arr["value"].'<br>';
		
	}
	
	//list()函数使用
	//list()函数只能接收索引数组且索引下标必须连续，list参数数量必须与数组元素数量相同
	list($name,$age,$sex)=array("zhangsan",40,"man");
	echo $name.'----';
	echo $age.'----';
	echo $sex.'<br>';
	
	list($name,,$sex)=array("zhangsan",30,"man");
	echo $name.'----';
	echo $sex.'<br>';
	
	$ip="192.168.1.100";
	list(,,,$d)=explode(".",$ip);
	echo $d.'<br>';
	// next(数组) 向下移动一针
	// prev(数组) 向上移动一针
	// reset(数组) 返回到数组第一针
	// end(数组) 移动到最后
	// current(数组)
	// key(数组)
	$user=array("id"=>1,"name"=>"zhangsan","age"=>20,"sex"=>"man");
	list($key,$value)=each($user);
	echo $key.'--->'.$value;
	
?>


<hr>
<?php
	//超全局数组
	//$_GET  经由url请求提交至脚本的变量
	//$_POST  经由HTTP post方法提交到脚本的变量
	//$_REQUEST  经由 get和post cookie机制提交到脚本变量，该数组不值得信任，不建议使用
	//$_FILES  经由HTTP post文件上传而提交至脚本
	//$_COOKIE  
	//$_SESSION  
	//$_ENV  执行环境提交脚本的变量。客户端环境
	//$_SERVER  web服务器环境
	//$GLOBALS  只要是当前脚本有效的变量都在这里，数组键名为全局便令的名称
	  
	//常用的数组处理函数
	/*
		一，数组键值有关系的数组
			1.array_values();  取出数组的值，并转成索引数组。
			2.array_keys();	取出数组的健
			3.in_array();	检索数组中是否存在某个值。
			4.array_key_exists()	检索数组中是否存在某个键
			5.array_flip()	交换数组中的键和值
			6.array_reverse()	返回一个单元顺序相反的数组
		二，统计数组元素的个数和唯一性
			1，count() 统计数组长度   sizeof()和count()一样，注：统计二位数组或者多维数组用法count($arr,1)
			2，array_count_values()	统计数组中所有的值出现的次数
			3，array_unique()	移除数组中重复的值
		三，使用回调函数处理数组的函数
			1，array_filter()	用回调函数过滤数组中的单元，
			2，array_walk()	对数组红每个成员应用用户函数
			3，array_map()	将回调函数作用到给定数组的单元上
		四，数组的排序函数
			sort()	由小到大排序，键会被忽略
			rsort()	由大到小排序，键会被忽略
			usort()	根据用户自定义排序
			uksort()	根据用户自定义排序
			uasort()	根据用户自定义排序
			asort()	根据元素的值对数组排序(由小到大)，不忽略键
			arsort()	跟军元素的值对数组排序(由大到小)，不忽略键
			ksort()	根据下标由小到大排序
			krsort()	跟进下标由大到小排序
			natsort()	按自然数排序
			natcasesort()	按自然数排序
			array_muitisort()	多维数组排序
			
		五，数组的拆分，合并，分解，结合的数组函数
			array_slice()	从数组取出一段
			array_splice()	删除数组中的一段
			array_combine()	合并两个数组，一个当键，一个当值。注：数组的长度要求一致。
			array_merge()	合并两个数组，两个数组的值会合并，键值重新
			array_intersect()  打印出两个数组交集的键值
			array_diff()	去除两个数组重复的键值
			
		六，数组与数据结构的函数
			array_push()	实现堆栈
			array_pop()	实现堆栈
			array_unshift()	实现队列
			array_shift()	实现队列
			unset()  		例子：unse($arr[1])
			
		七，其他与数组操作的有关的函数
			array_rand()	随机从数组中元素，取的是数组的键，如果取值  $arr[array_rand($arr)];
			shuffle()	随机打乱数组中元素顺序
			array_sum()	求数组中的和
			range()	 
			
	$arr=range(0,10);  //Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 3 [4] => 4 [5] => 5 [6] => 6 [7] => 7 [8] => 8 [9] => 9 [10] => 10 )
	$arr=range(0,50,10); //Array ( [0] => 0 [1] => 10 [2] => 20 [3] => 30 [4] => 40 [5] => 50 )
	
	
	*/
	
	$arr=array(1,2,3,4,5,6,7,8,9,10);
	$arr1=array_filter($arr,"myfun");
	function myfun($n){
		if($n%2==0){
			return true;
		}else{
			return false;
		}
	}
	
	echo '<pre>';
	print_r($arr1);
	echo '</pre>';
	
	$lamp=array("os"=>"linux","web"=>"apache","db"=>"mysql","language"=>"php");
	array_walk($lamp,"myfun1","--------");
	function myfun1($value,$key,$p){
		echo $key,$p,$value.'<br>';
	}
	
	$arr=range(0,50,10);
	print_r($arr);
	
?>


<hr>
<?php
	/*
	php面向对象的程序设计
		对象三个特性：封装、继承、多态
		命名规则：
		aaa bbb ccc
		变量：aaaBbbCcc
		函数：aaaBbbCcc
		常量：AAABBBCCC
		类名：AaaBbbCcc
	
	
		class 类名{
			public 成员属性1；
			public 成员属性2；
			publicn成员属性3：
			
			function 成员方法1{
				
			}
			function 成员方法2{
				
			}
			function 成员方法3{
				
			}
		}
		
		$变量1=new 类名；
		$变量1->成员属性1="值"；
		$变零1->成员方法1()；
		
		
		
		构造方法：
			1，是对象创建完成以后，第一个自动调用的方法
			2，构造方法名是固定的。
				在php4中，和类名相同的方法就是构造方法。
				在php5中，构造方法选择使用魔术方法 __construct(),所有类中声明构造方法使用这个名称。
				 	优点，在改变类名时，构造方法不用改变。
		魔术方法：在类中写出了某个魔术方法，这个方法对象的功能就会添加上，方法名称都是固定的，没有自定义的。
				第一个魔术方法，都是在不同时刻为了完成某一功能自动调用的方法。不同的魔术方法有不同调用时机。
				都是以__开头的方法：
				__construct() 构造方法：是对象创建完成以后，"第一个""自动"调用的方法
				__destruct()	析构方法：当对象被释放之前最后一个"自动"调用的方法。作用：关闭一些资源，做一些清理的工作。
				
				__set()
				__get()
				__isset()
				__unset()
				__clone()
				__call()
				__sleep()
				__weakup()
				__toString()
				__autoload()
										
			作用：就是为成员属性初始化
			
		封装性：面对对象的三大特性之一
			1，就是把对象的成员(属性，方法)结合成一个独立的相同单位，并尽可能隐藏对象内部细节。
				public
				protected
				private 私有的，用这个关键字修饰成员，只能在对象内访问，不能再对象外访问。
				属性封装
					只要一个变量，需要在多个方法使用，就将这个方法声明为成员属性，可以直接在这个对象中的所有方法使用成员属性，就相当于这个对象
					中的全局变量。
					成员属性都会在方法中使用，成员属性的变化其实就是在改变方法的执行行为，也就是改变了对象的功能，成员属性的值如果不正常，方法
					执行的功能也就不正常了。
					
					作用：不需要在对象外部改变或读取它的值。在提供一个公有的方法(经过方法对象成员属性进行赋值和取值就可以控制)
				
				方法封装
					作用：1，使用private修饰使用其只能在内部使用。
						 2，一个类中100个方法，封装了95个(为另外的5个服务的方法)，只有5个方法可以使用。
					魔术方法；
					__set()	是直接设置私有成员属性时，自动调用的方法
					__get()	是直接获取私有成员属性时，自动调用的方法
					__isset()	是直接isset查看对象中私有属性是否存在时，自动调用的方法
					__unset()	是直接unset删除对象中私有属性时，自动调用的方法
						 
	*/

		class Person{
			private $name;	//封装属性
			private $age;
			private $sex;
			
			function __construct($name="",$age="30",$sex="man"){		//构造方法
				$this->name=$name;
				$this->age=$age;
				$this->sex=$sex;
			}
			public function __get($proName){
				if($proName=="age"){
					if($this->age>40){
						return $this->age-10;
					}
				}
				return $this->$proName;
			}
			public function __set($proName,$proValue){
				if($proName=="age"){
					if($proValue >100 || $proValue < 0){
						return;
					}
				}
				$this->$proName=$proValue;
			}
			public function __isset($proName){
				if($proName=="age"){
					return false;
				}
				return isset($this->$proName);
			}
			public function __unset($proName){
				unset($this->$proName);
			}
			function setAge($age){
				if($age > 100 || $age < 0){
					return;
				}
				$this->age=$age;
			}
			function say(){
				echo '我的名字：'.$this->name.'，我的年龄：'.$this->age.' ，我的性别：'.$this->sex.'<br>';
				$this->run();
			}
			private function run(){		//封装方法
				echo 'runing--runing--runing<br>';
			}
			function eat(){
				
			}
			function __destruct(){		//析构方法
				echo $this->name.'：goodbaby<br>';
			}
		}

$p1=new Person("zhangsan",20,"girl");
$p2=new Person("lisi",40);
$p3=new Person("wangwu");

$p1->say();	
// 如果在此行加入$p1=null; 析构方法输出顺序则是 1 3 2
$p2->say();
$p3->say();	//栈  后进先出

$p1->setAge(90);
$p1->say();


//unset($p1->name);

if(isset($p1->name)){
	echo '存在<br>';
}else{
	echo '没有这个成员<br>';
}

?>


<hr>
<?php
	/*
	继承性：三大特性之一，开放性，可扩充性。增加代码的重用性。提高了原件的可维护性。
	父类-基类
	子类-派生类
	继承就是用于子类去"扩展""父类
	作用：
	
	一，类继承性的应用
		声明一个子类，使用extends 关键字去继承一个父类
		子类可以从父类继承所有的内容，包括成员属性，成员方法，构造方法·······在子类都可以直接使用。
	二，访问类型控制
		虽然子类可以继承父类中继承所有内容，但是private得成员，只能在父类使用，子类无法使用。
		封装时，既可以让自己类访问，也可以让子类访问，但是类的外部不能使用。使用protected权限
		
					private 		protected 		public
		自己类		可以使用 			可以使用 			可以使用
		子类			不可以使用		可以使用 			可以使用
		类外部		不可以使用		不可以使用		可以使用
	三，子类中重载父类的方法
		子类可以声明和父类相同的方法名，即子类覆盖了父类中同名的方法。
		在子类中调用父类中被覆盖的方法，使用parent::方法名。
		注：
			1，在子类中编写构造方法，如果父类中也有构造方法，一定要去调用一次父类中被覆盖的那个构造方法。
			parent::__construct()
			2，子类中重载的方法，不能低于父类中访问权限(子类可以放大权限，但是不能缩小权限)
			
			
	PHP中常用的关键字
		final 	
			1，final 不是修饰成员属性
			2，final只能修饰类和方法。
			作用：
				使用final修饰的类不能被子类继承
				使用final修饰的方法也不能被子类覆盖。
				用来限制类不被继承，方法不被覆盖就是使用fianl
		static
			1，用来修饰成员属性和成员方法，不能修饰类
			2，用static修饰的成员属性，可以被同一个类的所有对象共享
			3，静态的数据是存在内存数据段中
			4，静态的数据在类每一次加载时，自动分配到内存中。以后再用刀类时就直接从数据段总获取
			注意：类内部使用：self::静态成员
				类外部使用：类名::静态成员
			5，静态方法，不能访问非静态的成员，(在非静态的方法中可以访问静态成员)。
			6，静态方法不用使用对象来调用，也没有对象
			注意：类内部使用：self::静态成员
				类外部使用：类名::静态成员
		const
			1，只能修饰成员属性。
			2，类中声明常量属性用const
			3，命名的方式和我们以前学习的define是一样的效果。
			4，访问方式和静态成员属性时一样的。在类外部访问：类名::常量，在类内部使用：self::常量
			5，常量一定要声明时就给初始值。
	PHP中常用的魔术方法
		__call()	 	
			作用：在调用对象不存在的方法时，就会出现系统报错，程序退出，就会自动调用__call()。
			这个方法需要2个参数
		__toString() 	直接输出引用时自动调用，用来快速获取对象字符串表示的最便捷的方式。
		
		__autoload()
			注意：其他魔术方法都是在类中添加使用，这个是唯一不在类中使用的魔术方法
			只要在页面中使用到一个类，只要用到类名，就会自动把类名传给这个参数。
			
		__clone() 	克隆对象，就是在克隆对象时，自动调用的方法。
					只要一个对象诞生，就要有初始化的动作，和构造方法__construct()作用类似，在__clone()方法中的$this关键字代表的这个副本。
					$that代表原本的对象(但是不好用)
	
	
		对象串行化(序列化)，将一个对象转为二进制串(对象时存储在内存。)
			1，将对象长时间存储在数据库或文件时
			2，将对象砸多个PHP文件中传输。
			serialize() ：参数是一个对象，返回来的就是串行化的二进制串
			unserialize()：参宿就是对象的二进制串，返回来的就是新生成的对象。
		__sleep() 	
			是在序列化时自动调用的方法，就是可以将一个对象部分串行化
		__wakeup()
			是在反序列化时自动调用的方法，也就是对象重新诞生的一个过程(__construct(),__clone(),__wakeup())。
	
	*/

?>


<hr>
<?php
/*  抽象类 接口 多态
 *
 *  抽象类是一种特殊的类， 接口是一种特殊的抽象类， 而多态就要使用到抽象类或是接口
 *
 *  声明抽象类和接口，以及一些需要的技术
 *
 *  抽象类
 *
 *      什么是抽象方法？
 *
 *      	定义：如果一个类中的方法，没有方法体的方法就是抽象方法(就是一个方法没有使用{}而直接使用分号结束)
 *      		
 *      		abstract function test();  //抽象方法
 *			
 *			function test(){  //有方法体，但方法体为空的
 *				
 *			}
 *
 *			如果一个方法是抽象方法，就必须使用abstract修饰
 *
 *		
 *
 *		为什么要使用抽象方法？
 *      	
 *
 *  	什么是抽象类？
 *  		
 *  		1. 如果一个类中，有一个方法是抽象的则这个类就是抽象类
 *  		2. 如果一个类是抽象类，则这个类必须要使用abstract修饰
 *  		3. 抽象类是一种特殊的类，就是因为一个类中有抽象方法，其他不变。也可以在抽象类中声明成员属性，常量，非抽象的方法。
 *  		4. 抽象类不能实例化对象（不能通过抽象类去创建一个抽象类的对象）
 *
 *
 *  		一、抽象方法没有方法体，不知道做什么的（没写功能）
 *  		二、对象中的方法和属性都要通过对象来访问，除常量和静态的变量和方法， 而抽象类又不能创建对象，抽象类中的成员都不能直接访问
 *
 *		
 *
 *
 *  接口
 *
 *
 *  作用：
 *  	要想使用抽象类，就必须使用一个类去继承抽象类，而且要想使用这个子类，也就是让子类可以创建对象，子类就必须不能再是抽象类， 子类可以重写父类的方法（给抽象方法加上方法体）
 *
 *		抽象方法中的方法没有方法体， 子类必须实现这个方法 （父类中没写具体的实现， 但子类必须有这个方法名）
 *
 *
 *	就是在定义一些规范，让子类按这些规范去实现自己的功能
 *
 *	目的： 就是要将你自己写的程序模块 加入 到原来已经写好的程序中去 （别人写好的程序，不能等你开发完一个小模块，根据你的小模块继续向后开如）
 *
 *  多态
 *
 *
 /* 接口技术
 *
 * 接口中一种特殊的抽象类， 抽象类又是一种特殊的类
 *
 *
 * 接口和抽象类是一样的作用
 *
 * 因为在PHP是单继承的， 如果使用抽象类，子类实现完抽象类就不能再去继承其它的类了。
 *
 * 如果即想实现一些规范， 又想继承一个其他类。就要使用接口
 *
 *    接口和抽象类的对比
 *
 *    1. 作用相同，都不能创建对象， 都需要子类去实现
 *    2. 接口的声明和抽象类不一样
 *    3. 接口被实现的方式不一样
 *    4. 接口中的所有方法必须是抽象方法，只能声明抽象方法（不用使用abstract修饰）
 *    5. 接口中的成员属性，只能声明常量，不能声明变量
 *    6. 接口中的成员访问权限 都必须是public, 抽象类中最低的权限protected
 *    7. 使用一个类去实现接口， 不是使用extends关键字， 而是使用implements这个词
 *
 *	 如果子类是重写父接口中抽象方法，则使用implements, 类--接口， 抽象类---接口 implements 接口---接口 extends
 *
 *    可以使用抽象类去实现接口中的部分方法
 *    如果想让子类可以创建对象，则必须实现接口中的全部抽象方法
 *    
 *    可以定义一个接品口去继承另一个接品口
 *
 *    一个类可以去实现多个接口（按多个规范去开发子类）, 使用逗号分隔多个接口名称
 *
 *    一个类可以在继承一类的同时，去实现一个或多个接口(先继承，再实现)
 *
 *    使用implements的两个目的
 *    	1. 可以实现多个接口 ，而extends词只能继承一个父类
 *    	2. 没有使用extends词，可以去继承一个类， 所以两个可以同时使用
 *
 *
 *    class 类名{
 *
 *    }
 *
 *    abstract class 类名 {
 *
 *    }
 *
 *   声明方式
 *
 *   interface 接口名{
 *
 *   }
 *
 *   多态：  多态是面向对象的三大特性之一
 *
“多态”是面向对象设计的重要特性，它展现了动态绑定（dynamic binding）的功能，也称为“同名异式”（Polymorphism）。多态的功能可让软件在开发和
维护时，达到充分的延伸性（extension）。事实上，多态最直接的定义就是让具有继承关系的不同类对象，可以对相同名称的成员函数调用，产生不同的反应
效果。
 *
 * 
 *
 
 *
 *
 */

interface  USB {
	function mount();
	function work();
	function unmount();
}


class Upan implements USB {
	function mount(){
		echo "U 盘挂载成功， 可以使用<br>";
	}

	function work(){
		echo "U 盘开始工作<br>";
	}

	function unmount(){
		echo "U 盘卸载成功<br>";
	}
}

class FengShan implements USB {
	function mount(){
		echo "风扇 挂载成功， 可以使用<br>";
	}

	function work(){
		echo "小风扇开始吹小风<br>";
	}

	function unmount(){
		echo "风扇卸载成功<br>";
	}
}



class DianNao {
	function  useUSB($usb){  //多态的用法
		$usb->mount();
		$usb->work();
		$usb->unmount();
	}
}

class Worker {
	function install(){
		//找到电脑
		$dn=new DianNao;
		//拿过来一些USB设备
		
		$up=new Upan;
		$fs=new FengShan;

		//向电脑是插入USB设备
		$dn->useUSB($fs);
		$dn->useUSB($up);

	}
}


$ren=new Worker;

$ren->install();

?>
<hr>
<?php
/*
* 字符串的特点
 * 	substr("string", 2, 4);
 * 	substr(123456789, 2, 4);
 *	
 *	1. 其它类型的数据用在字符串处理函数中，会自动将其转为字符串后，再处理
 *	2. 可以将字符串视为数组，当做字符集合来看待
 *
 *	$str="abcdefg";
 *	echo $str[2];
 *	echo $str{2}; 
 *
 *   
 *  强大的PHP中内置字符串处理函数
 *  
 *   1. 常用的字符串输出函数
 *
 *   	echo()
 *   	print()
 *   	die() --- exit();
 *   	printf()  格式化字符串
 *   	sprintf() 返回格式化的字符串	printf("%s--%d---%f-%.2f-%b---%c-----%x--%o------%'_-20s----------%s<br>",$str,$str,$str,$str,$str, $str,$str, $str, $str, $str);
 *   	%%	%b	%c	%d	%f	%o	%x	%s
 *
 *   2. 常用的字符串格式化函数
 *   	ltrim();去除左空格	还可以去除指定的字符	ltrim($str, '1')   ltrim($str, '0..9')
 *   	rtrim();去除右空格
 *		trim();去除两边空格  在做提交表单的时候,去除两边的空格在查数据库。
 *   
 *      空格是在字符串中占一位的
 *  
 *		str_pad();	字符串补充	str_pad($str, 10, "-=")		str_pad($str, 10, "-=", STR_PAD_BOTH)	str_pad($str, 10, "-=", STR_PAD_LEFT)
 *
 * 		大小写相关的函数
 *		strtolower();	所有字符串都转成小写
 *		strtoupper();	所有字符串都转成大写
 *		ucfirst();	首字母转成大写
 *		ucword();	每个单词首字母大写
 *
 * 		和html标签相关的字符串格式化
 *		nl2br()	添加换行
 *		htmllentities();
 *		htmlspecialchars();	把html标签转成实体
 *		stripslashes();	删除反斜线							htmlspecialchars(stripslashes($str)) 解决提交含有html标签
 *		strip_tags();	删除html标签
 *
 *		其他的字符串格式化函数
 *		number_format(); 	浮点数处理函数
 *		strrev();	字符串反转。
 *		md5();	加密字符串。32位
 * 		md5_file();	文件md5加密
 *
 *
 *		注意:在PHP中所有字符串处理函数，都不是在原字符串上修改， 而是返回一个新格式化后的字符串。
 *
 * 		strlen();	返回字符串长度
 *
 * 		字符串比较函数:
 * 		strcmp();		$str1=$str2  0   $str1>$str2  1   $str1<$str2  -1
 * 		strcasecmp();	忽略字符串大写比较,返回 0  1  -1
 * 		以上两个是按照字节顺序,下面的是按照自然数排序
 * 		strnatcmp();
 *
 *
 * 		手册里的字符串函数,都用一下。
 *
 *
 *
 *

*/
	
	
?>


<hr>
<?php
/* 1. 正则表达式就是描述字符串排列模式的一种自定义语法规则。
 * 2. 如果可以使用字符串处理函数完成的任务，就不要使用正则
 * 3. 有一些复杂的操作，只能使用正则完成。
 *
 * 正则表达式可以在很多计算机语言中应用
 *
 *  4. 正则表达式也称为一种模式表达式。
 *  5.正则表达式就是通过构建具有特定规则的模式，与输入的字符信息比较。再进行分割、匹配、查找、替换等工作
 *
 *    "/\<img\s*src=\".*?\"\/\>/"
 *
 *    一、正则表达式也是一个字符串
 *    二、由具有特殊意义的字符组成的字符串
 *    三、具有一点编写规则，也是一种模式
 *    四、看作是一种编程语言（是用一些特殊字符，按规则编写出一个字符串，形成一种模式---正则表达式）
 *
 *
 *    注意： 如果正则表达式，不和函数一起使用，则它就是一个字符串，如果将正则表达式放到到某个函数中使用， 才能发挥出正则表达式的作用。
 *
 *     用到分割函数中，就可以用这个正则去分割字符串
 *     用到替换函数中，就可以用这个正则去替换字符串
 *     ...
 *
 *	在PHP中给我们提供两套正则表达式函数库
	POSIX 扩展正则表达式函数（ereg_）
	Perl 兼容正则表达式函数(preg_)

	这个函数功能一样， 找一个处理字符串效率高的

	注意：推荐使用Perl 兼容正则表达式函数库（只学这一种）



	学习正则表达式时，有两方面需要学习：

	一、正则表达式的模式如何编写
	语法：
		1. 定界符号  //
			除了字母、数字和正斜线\ 以外的任何字符都可以为定界符号
			| |
			/ /
			{ }
			! !

			没有特殊需要，我们都使用正斜线作为正则表达式的定界符号


		2. 原子   img \s .
			注意：原子是正则表达式的最基本组成单位，而且必须至少要包含一个原子
			只要一个正则表达式可以单独使用的字符，就是原子

			1. 所有打印（所有可以在屏幕上输出的字符串）和非打印字符（看不到的）
			2. \. \* \+ \? \( \<\> 如果所有有意义的字符，想作为原子使用，统统使用 ”\“转义字符转义 m
				" \ "转义字符可以将有意的字符转成没意义的字符，还可以将没意义的字符转为有意义的字符
			3. 在正则表达式中可以直接使用一些代表范围的原子
				\d  : 表示任意一个十进制的数字       [0-9]
				\D  : 表示任意一个除数字这外的字符   [^0-9]
				\s  : 表示任意一个空白字符，空格、\n\r\t\f   [\n\r\t\f ]
				\S  : 表示任意一个非空白                     [^\n\r\t\f ]
				\w  : 表示任意一个字 a-zA-Z0-9_              [a-zA-Z0-9_]
				\W  : 表示任意一个非字， 除了a-zA-Z0-9_以外的任意一个字符  [^a-zA-Z0-9_]
			4. 自己定义一个原子表[], 可以匹配方括号中的任何一个原子
				[a-z5-8]
				[^a-z] 表示取反， 就是除了原子表中的原子，都可以表示(^必须在［］内的第一个字符处出现)


		3. 元字符  * ?
			元字符是一种特殊的字符，是用来修饰原子用的，不可以单独出现
			*  : 表示其前的原子可以出现 0次、1次、或多次                       {0,}
			+  : 表示其前的原子可以出现1次 或多次， 不能没有最少要有一个       {1,}
			?  ： 表示其前面的原子可以出现0次或1次， 有只能有一次，要么没有    {0,1}
			{} : 用于自己定义前面原子出现的次数
				{m}   //m表示一个整数， {5}表示前面的原子出现5次
				{m,n}  //m和n表示一个整数，{2,5} m要小于n, 表示前面出现的原子，最少m次，最多n次，包括m和n次
				{m,}   //表示前面的原子最少出现m次,最多无限

			.   : 默认情况下，表示除换行符外任意一个字符
			^   : 直接在一个正则表达式的第一个字符出现，则表达必须以这个正则表达式开始
			$   : 直接在一个正则表达式的最后一个字符出现，则表达必须以这个正则表达式结束
			|   : 表示或的关系 , 它的优先级号是最低的， 最后考虑它的功能

			\b  : 表示一个边界
			\B  ： 表示一个非边界

			()  : 重点

			一、 () 作用： 是作为大原子使用
			二、 改变优先级,加上括号可以提高优先级别
			三、 作为子模式使用, 正则表达式不先对一个字符串匹配一次, 全部匹配作为一个大模式，放到数组的第一个元素中，每个()是一个子模式按顺序放到数组的其它元素中去。
			四、可以取消子模式，就将（）作为大原子或改变优先级使用, 在括号中最前面使用"?:"就可以取消这个（）表示的子模式
			五、反向引用， 可以在模式中直接将子模式取出来，再作为正则表达式模式的一部分， 如果是在正则表达式像替换函数preg_replace函数中， 可以将子模式取出， 在被替换的字符串中使用

			\1 取第一个子模式、 \2取第二个子模式， ....  \5 (注意是单引号还是双引号引起来的正则)

			"\\1"
			'\1'

			${1} ${2}

			\* \+ \. \?

			优先级
			\
			() (?:) []
			* + ? {}
			^  $   \b
			|

		4. 模式修正符号	 i u
			"/ /模式修正符"
			1. 就是几个字母
			2. 可以一次使用一个，每一个具一定的意义， 也可以连续使用多个
			3. 是对整个正则表达式调优使用， 也可以说是对正则表达式功能的扩展

			"/abc/" 只能匹配小写字母 abc
			"/abc/i" 可以不区分大小写匹配 ABC abc Abc ABc AbC

		i : 表示在和模式进行匹配进不区分大小写
		m : 默认情况，将字符串视为一行  ^  $ 视为多行后，任何一行都可以以正则开始或结束
		s : 如果没有使用这个模式修正符号时， 元字符中的"."默认不能表示换行符号,将字符串视为单行
		x : 表示模式中的空白忽略不计
		e : 正则表达式必须使用在preg_replace替换字符串的函数中时才可以使用(讲这个函数时再说)
		A :
		Z :
		U : 正则表达式的特点：就是比较”贪婪“  .* .+ 所有字符都符合这个条件

			一种使用模式修正符号 U
			加一种是使用?完成  .*?  .+?

			如果两种方式同时出现又开启了 贪婪模式  .*? /U

		"/\<img\s*src=\".*?\"\/\>/iU"
		"#\<img\s*src=\".*?\"\/\>#iU"

		/原子和元字符/模式修正符号   / 为定界符号 （有一些语言是不需要这个定界符号）

		有点语言中不支持模式修正符号 javascript


		用户名不能为空 /^\S+$/
		email
		url
		电话

		将一个网站中的所有图片取出
		将一个网站的所有商品取出，


	二、学习正则表达式的强大处理函数
		preg_match();

*
 *
 *
 *
 */


$pattern = '/abc/';
$string = '1111aa1bb11cc11abc1111a11b11c11';

if (preg_match($pattern,$string)){
	echo '正则表达式'.$pattern.'和字符串'.$string.'匹配成功';
} else {
	echo '正则表达式'.$pattern.'和字符串'.$string.'匹配失败';
}

?>


<hr>
<?php
/*  PHP文件系统处理
 *	所有文件处理都是使用系统函数完成的。
 *	是基于Linux/Unix系统为模型
 *
 *  	文件系统处理的作用：
 *  		1. 所有的项目离不开文件处理
 *  		2. 可以用文件长时间保存数据
 *  		3. 建立缓存， 服务器中文件操作
 *
 *  	文件处理
 *		1. 文件类型
 *			以Linux为模型的， 在Windows只能获取file, dir或unknow 三种类型
 *			在Linux/Unix下， block, char, dir, fifo, file, link, unknown和种型
 *			block :块设置文件，磁盘分区，软驱， cd-rom等
 *			char: 字符设备，I/O 以字符为单位， 键盘，打印机等
 *			dir: 目录也是文件的一种
 *			fifo:
 *			file:
 *			link:
 *			unknown
 *
 * 			filetype("目录或文件名")
 *
 * 			is_array();
 * 			is_int();
 * 			is_string();
 * 			is_null;
 * 			is_bool();
 *
		is_dir -- 判断给定文件名是否是一个目录
		is_executable -- 判断给定文件名是否可执行
		is_file -- 判断给定文件名是否为一个正常的文件
		is_link -- 判断给定文件名是否为一个符号连接
		is_readable -- 判断给定文件名是否可读
		is_uploaded_file -- 判断文件是否是通过 HTTP POST 上传的
		is_writable -- 判断给定的文件名是否可写
		is_writeable -- is_writable() 的别名
 *
 *
 *		2. 文件的属性
 *			file_exists();
 *			filesize();
 *			is_readable();
 *			is_writeable();
 *			filectime();
 *			filemtime();
 *			fileactime();
 *			stat();
 *
 **		3. 和文件路径相关的函数
 *
 *			相对路径：相对于当前目录的上级和下级目录
 *				.  当前目录
 *				.. 上一级目录
 *
 *				./php/apache/index.php
 *				php/apahce/index.php
 *				login.php
 *				./login.php
 *				../images/tpl/logo.gif
 *
 *
 *			路径分隔符号
 *				linux/Unix    "/"
 *				windows       "\"
 *
 *				DIRECTORY_SEPARATOR  为不同平台，在Windows \ Linux /
 *
 *				不管是什么操作系统PHP的目录分割符号都支技 / (Linux)
 *
 *				在PHP和Apache配置文件中如果需要指定目录，也使用/作为目录符号
 *
 *			绝对路径：
 *				/ 根路径
 *
 *				/images/index.php
 *
 *				指的操作系统的根
 *				指的是存放网站的文档根目录
 *
 *                              分情况
 *
 *                              如果是在服务器中执行（通过PHP文件处理函数执行）路径 则 “根”指的就是操作系统的根
 *				如果程序是下载的客户端，再访问服务器中的文件时，只有通过Apache访问，“根”也就指的是文档根目录
 *
 *				http://www.xsphp.com/logo.gif
 *
 *
 *			basename(url)
 *			dirname(url)
 *			pathinfo(url)
 *
 *
 *
 *
 *		4. 文件的操作相关的函数（
 *
 *			创建文件 touch("文件名")
 *			删除文件 unlink("文件路径");
 *			移动文件 为文件重新命名 rename("当前文件路径"， “目录为文件路径”)
 *			复制文件 copy("当前"， “目标”);
 *
 *			一定要有PHP执行这个文件权限， Apache, 一个用户
 *
 *
 *		和权限设计有关的函数
 *
 *
		ls -l  或 ll

		_rwxrwxrwx   777

		_ 类型 _文件  d 表示是目录  l  b

		rwx 表这个文件的拥有者  r读 w写 x执行
		rwx 表这个文件的拥有者所在的组  r读 w写 x执行
		rwx 其它用户对这个为文件的权限  r读 w写 x执行

		r 4
		w 2
		x 1

		7 7 7  4+2+1  4+2+1 4+2+1
			rwx   rwx  rwx

		644
			4+2   4   4
			rw_  r__ r__
		754

		chmod u=rwx,g=rw,o=x
		chmod 777  demo.php
		chmod 644  demo.html

		chown  mysql demo.php

		chgrp  apache demo.php

chgrp -- 改变文件所属的组
chmod -- 改变文件模式
chown -- 改变文件的所有者

filegroup -- 取得文件的组
fileowner -- 取得文件的所有者



  *		5. 文件的打开与关闭（读文件中的内容， 向文件中写内容）
 *			读取文件中的内容
 *				file_get_contents(); //php5以上
 *				file()
 *				readfile();
 *
 *					不足：全部读取， 不能读取部分，也不能指定的区域
 *
 *				fopen(URL, mode)
 *
 *			本地文件：
 *				./test.txt
 *				c:/appserv/www/index.html
 *				/usr/local/apahce/index.html
 *
 *			远程：
 *				http://www.baidu.com
 *
 *				fopen("./test.txt", "a+")
 *
 *					fwrite fread
 *
 * 				r , 以只读模式打开文件
 * 				r+  写
 * 				w， 以只写的方式打开，如果文件不存在，则创建这个文件,并写放内容，如果文件存在，并原来有内容，则会清除原文件中所有内容，再写入（打开已有的重要文件）
				w+ 除了可以写用fwrite, 还可以读fread
 * 				a   以只写的方式打开，如果文件不存在，则创建这个文件，并写放内容，如果文件存在，并原来有内容，则不清除原有文件内容，再原有文件内容的最后写入新内容，（追加）
 * 				a+除了可以写用fwrite, 还可以读fread
 * 				b 以二进制模式打开文件（图，电影）
 * 				t 以文本模式打开文件
 *					fread()  // 第一个是读取指定长度的字符
 *					fgetc()  //一次从文件中读取一个字符
 *					fgets()  //一次从文件中读取一行字符
 *
 *
 *						feof($file); 如果读取文件出错，或到文件结束，则返回真
 *
 *			写入文件
 *				file_put_contents(“URL”， “内容字符串”);  //php5以上
 *					如果文件不存在，则创建，并写入内容
 *					如果文件存在，则删除文件中的内容，重新写放
 *
 *					不足： 不能以追加的方式写，也不能加锁
 *
 *				fopen()
 *					fwrite() 别名 fputs
 *
 *					第一个参数是文件资源（fopen返回来的），第个参数是写的内容
 *
 *
 *			本地文件：
 *				./test.txt
 *				c:/appserv/www/index.html
 *				/usr/local/apahce/index.html
 *
 *			远程：
 *				http://www.baidu.com
 *				http://www.163.com
 *
 * 				ftp://user@pass:www.baidu.com/index.php
 *
 *		6. 文件内部移动指针
 *			ftell($file) //返回当前文件针的位置
 *
 *			fseek($file, 10);
 *
 *			fread();
 *
 *			rewind();
 *
 *
 *		7. 文件的锁定一些机制处理
 *
 *
 *  	目录的处理
 *  		1. 目录的遍历
 *  		2. 目录的创建
 *  		3. 目录的删除
 *  		4. 目录的复制
 *		5. 统计目录大小
 *
 *
 *  	文件上传和下载
 *  		1. 上传
 *  		2. 下载
18911150010


 *
 *
 */
?>


<hr>
<?php

?>


<hr>
<?php

?>
<hr>
<?php

?>
<hr>
<?php

?>


<hr>
<?php

?>


<hr>
<?php

?>
<hr>
<?php

?>


<hr>
<?php

?>


<hr>
<?php

?>










