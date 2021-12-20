# Datalist FieldType for ExpressionEngine 

The Dataist FieldType allows you to add `datalist` input fields into your ExpressionEngine Channel Entries. It's based off the [<datalist\>: The HTML Data List element](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/datalist) spec and should comply with everything laid out there.

## Details
Will output an HTML input field for Channel Entries that resemble:

```html
<input list="__my_list" type='text' id="custom-field-name" value="5" />
<datalist id=__my_list">
<option value="1">One</value>
<option value="2">Two</value>
<option value="3">Three</value>
<option value="4">Four</value>
<option value="5">Five</value>
</datalist>
```

### Compatibility

The Datalist FieldType should work with:

- [Grid FieldType](https://docs.expressionengine.com/latest/fieldtypes/grid.html "Grid FieldType")
- Matrix FieldType
- [Fluid FieldType](https://docs.expressionengine.com/latest/fieldtypes/fluid.html "Fluid FieldType")
- [Seeder by CartThrob](https://expressionengine.com/add-ons/seeder-by-cartthrob "Seeder By CartThrob")
- Unit Tests

### Modifiers

#### :label
Will output the label instead of the value for the field.

##### Example
```html
{my_field_name:label}
```

### License

I don't care. 