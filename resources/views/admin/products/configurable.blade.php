<p class="text-primary mt-4">Product Variants</p>
<hr/>
 @foreach ($product->variants as $variant)
 {!! Form::hidden('variants['. $variant->id .'][id]', $variant->id) !!}
    <div class="card bg-secondary color-palette">
    <div class="row text-center">
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('sku', 'SKU') !!}
                {!! Form::text('variants['. $variant->id .'][sku]', $variant->sku, ['class' => 'form-control text-center']) !!}
            </div>
        </div>
        <div class="col-md-10">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('variants['. $variant->id .'][name]', $variant->name, ['class' => 'form-control text-center']) !!}
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('price', 'Price') !!}
                {!! Form::text('variants['. $variant->id .'][price]', $variant->price, ['class' => 'form-control text-center', 'required' => true]) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('qty', 'Stock') !!}
                {!! Form::text('variants['. $variant->id .'][qty]', ($variant->productInventory) ? $variant->productInventory->qty : null, ['class' => 'form-control text-center', 'required' => true]) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('weight', 'Weight') !!}
                {!! Form::text('variants['. $variant->id .'][weight]', $variant->weight, ['class' => 'form-control text-center', 'required' => true]) !!}
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('links', 'Order Produk') !!}
                {!! Form::text('variants['. $variant->id .'][links]', $variant->links, ['class' => 'form-control text-center', 'required' => true]) !!}
            </div>
        </div>
    </div>
</div>

@endforeach
<hr/>