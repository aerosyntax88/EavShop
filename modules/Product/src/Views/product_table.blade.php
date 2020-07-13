@extends('layout')

@section('content')

    <style>
        table {
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid black;

        }
    </style>

    <form>

        <label for="limit">Limit:</label>
        <input type="text" id="limit" name="limit" @if($parameters->getLimit() != '') value="{{ $parameters->getLimit() }}" @endif>
        <label for="page">Page:</label>
        <input type="text" id="page" name="page" @if($parameters->getPage() != '') value="{{ $parameters->getPage() }}" @endif>

        {{--<select name="page" id="page">
        @for ($i = 1; $i < $products->getPerPage(); $i++)
            <option value="0">Select a value</option>
            <option @if($parameters->getPage() == $i) selected @endif value="{{$i}}">{{$i}}</option>
        @endfor
    </select>--}}
        <br>

        <label for="brand">Brand:</label>
        <select name="brand" id="brand">
            <option value="0">Select a value</option>
            @foreach($brands as $brand)
                <option @if($parameters->getBrand() == $brand->id) selected @endif value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach
        </select>

        <label for="size">Size:</label>
        <select name="size" id="size">
            <option value="0">Select a value</option>
            @foreach($sizes as $size)
                <option @if($parameters->getSize() == $size->id) selected @endif value="{{$size->id}}">{{$size->size}}</option>
            @endforeach
        </select>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" @if($parameters->getDescription() != '') value="{{ $parameters->getDescription() }}" @endif>

        <label for="minPrice">Min price:</label>
        <input type="text" id="minPrice" name="minPrice" @if($parameters->getMinPrice() != '') value="{{ $parameters->getMinPrice() }}" @endif>
        <label for="maxPrice">Max price:</label>
        <input type="text" id="maxPrice" name="maxPrice" @if($parameters->getMaxPrice() != '' && $parameters->getMaxPrice() != PHP_INT_MAX) value="{{ $parameters->getMaxPrice() }}" @endif>


        <input type="submit" value="Submit">
    </form>

    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Discounted Price</th>
            <th>Brand</th>
            <th>Resolution width</th>
            <th>Resolution height</th>
            <th>Size</th>

            <th>Description</th>
            <th>Created</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td> {{ $product['name']  }} </td>
                <td> {{ $product['price']  }} </td>

                @foreach($product->integerValues as $integerValue)
                    @if(($integerValue->attribute_id == 5))
                        <td> {{ $integerValue->value  }} </td>
                    @endif
                @endforeach

                @foreach($product->relationValues as $relationValue)
                    @if(!is_null($relationValue->brands[0]->name))
                        <td> {{ $relationValue->brands[0]->name  }} </td>
                    @endif
                    @if(!is_null($relationValue->sizes[0]->size))
                        <td> {{ $relationValue->sizes[0]->size }} </td>
                    @endif
                    @if(!is_null($relationValue->resolutionWidths[0]->value))
                        <td> {{ $relationValue->resolutionWidths[0]->value  }} </td>
                    @endif
                    @if(!is_null($relationValue->resolutionHeights[0]->value))
                        <td> {{ $relationValue->resolutionHeights[0]->value  }} </td>
                    @endif
                @endforeach

                @foreach($product->textValues as $textValue)
                    @if(($textValue->attribute_id == 6))
                        <td> {{ $textValue->value  }} </td>
                    @endif
                @endforeach
                <td> {{ $product['created_at']  }} </td>
            </tr>
        @endforeach
    </table>

    {{--{{ $products->links() }}--}}
@endsection