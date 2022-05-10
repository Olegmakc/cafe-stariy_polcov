<x-app-layout>
	<x-slot name="header">
		 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
			  @isset($product)
			 		{{ __('Редагування продукту: ')}}{{$product->title}}
				@else
					{{ __('Створення продукту') }}
				@endisset
		 </h2>
	</x-slot>
	<div class="py-2 admin__background_form">
		<div class="container mx-auto px-6">
			<div class="p-6 ">
				<div class="block">
					<form class="block__category category-form" method="POST" enctype="multipart/form-data"
						@isset($product)
							action="{{route('products.update',$product)}}" 
						@else
							action="{{route('products.store')}}"
						@endisset
						>
						<div class="category-form__row">
							@isset($product)
								@method('PUT')
							@endisset
							@csrf
							<label for="title">Назва продукту:</label>
							<input type="text" name="title"@error('title')@enderror value="@isset($product){{$product->title}}@else {{old('title')}}@endisset">
						</div>
						@error('title')
						<div class="alert-danger">{{ $message }}</div>
						@enderror 
						<div class="category-form__row">
							<label for="category_id">Категорія продукту:</label>
							<select name="category_id"> 
								@foreach ($categories as $category )		
									@isset($product)
										@if($product->category_id == $category->id)
										<option value="{{$category->id}}"selected>{{$category->name}}</option>	
									@else
										<option value="{{$category->id}}">{{$category->name}}</option>
									@endif
									@else
									<option value="{{$category->id}}">{{$category->name}}</option>
									@endisset	
								@endforeach
							</select>
						</div>
						<div class="category-form__row">
							<label for="photo" class="file-label">Зображення товару:</label>
							<input type="file" class="file" name="photo" @error('photo')@enderror value="{{old('photo')}}">
						</div>
						<div class="category-form__row">
							<label for="description">Опис продукту:</label>
							<input type="text" name="description" @error('description')@enderror value="@isset($product){{$product->description}}@else {{old('description')}}@endisset">
						</div>
						@error('description')
						<div class="alert-danger">{{ $message }}</div>
						@enderror 
						<div class="category-form__row">
							<label for="weight">Вага продукту:</label>
							<input type="text" name="weight" @error('weight')@enderror value="@isset($product){{$product->weight}}@else {{old('weight')}}@endisset">
						</div>
						@error('weight')
						<div class="alert-danger">{{ $message }}</div>
						@enderror 
						<div class="category-form__row">
							<label for="price">Ціна продукту:</label>
							<input type="text" name="price"@error('price')@enderror value="@isset($product){{$product->price}}@else {{old('price')}}@endisset">
						</div>
						@error('price')
						<div class="alert-danger">{{ $message }}</div>
						@enderror 
						<div class="category-form__row">
							@isset($product)
							<button type="submit">Зберегти зміни</button>
							@else
							<button type="submit">Створити</button>
						@endisset
						
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
