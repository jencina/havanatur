<div class="alert alert-success fade in col-md-12" style="border-width: 0 0 0 5px">
    <table class="detail-view table table-striped table-condensed">
    <tbody>
        <tr class="odd">
            <th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
            <td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id),array('style'=>'')); ?></td>
        </tr>
        <tr class="even">
            <th><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?></th>
            <td><?php echo CHtml::encode($data->nombre); ?></td>
        </tr>
        
        <tr class="odd">
            <th><?php echo CHtml::encode($data->getAttributeLabel('apellidos')); ?></th>
            <td><?php echo CHtml::encode($data->apellidos); ?></td>
        </tr>
        <tr class="even">
            <th><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?></th>
            <td><?php echo CHtml::encode($data->telefono); ?></td>
        </tr>
        
        <tr class="odd">
            <th><?php echo CHtml::encode($data->getAttributeLabel('email')); ?></th>
            <td><?php echo CHtml::encode($data->email); ?></td>
        </tr>
        <tr class="even">
            <th><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?></th>
            <td><?php echo CHtml::encode($data->fecha_creacion); ?></td>
        </tr>
        <tr class="odd">
            <th><?php echo CHtml::encode($data->getAttributeLabel('programa_combinacion_vigencia_id')); ?></th>
            <td><?php echo CHtml::encode($data->programa_combinacion_vigencia_id); ?></td>
        </tr>
        
        
        <tr class="even">
            <th><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?></th>
            <td><?php echo CHtml::encode($data->fecha_creacion); ?></td>
        </tr>
        
        <tr class="odd">
            <th><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?></th>
            <td><?php echo CHtml::encode($data->comentario); ?></td>
        </tr>
        
    </tbody>
</table> 
</div>
