<?php /* Smarty version 2.6.19, created on 2014-07-02 12:49:42
         compiled from common/useraccounts_list.phtml */ ?>
<?php echo '

<script>
  $(function () {
    $(\'#myTab a:first\').tab(\'show\')
  })
</script>
'; ?>


<div class='container padding pull-top'>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3>Users List</h3h3></div>
  <ul class="nav nav-tabs" role="tablist" id="myTab">
	<li class="active"><a href="#all" role="tab" data-toggle="tab">All</a></li>
	<li><a href="#clients" role="tab" data-toggle="tab">Clients</a></li>
	<li><a href="#contributers" role="tab" data-toggle="tab">Contributers</a></li>
	<li><a href="#suadmins" role="tab" data-toggle="tab">super Admins</a></li>
	<li><a href="#editors" role="tab" data-toggle="tab">Editors</a></li>
	<li><a href="#ceditors" role="tab" data-toggle="tab">Chief Editors</a></li>
	<li><a href="#cfd" role="tab" data-toggle="tab">Chiefodigeos</a></li>
	<li><a href="#ceo" role="tab" data-toggle="tab">CEO User</a></li>
	<li><a href="#cc" role="tab" data-toggle="tab">Customer Care</a></li>
	<li><a href="#fact" role="tab" data-toggle="tab">Facturation</a></li>
	<li><a href="#multi" role="tab" data-toggle="tab">Multilingue</a></li>
</ul>

<div class="tab-content">
  <!-- Tab 1 start -->	
  <div class="tab-pane active" id="all">
	  <div class="panel-body" style='overflow:auto;height:600px;'>


  <!-- Table -->
  <table class="table" >
	<thead >
   <tr>
	<th rowspan='2'>Email</th>
	<th rowspan='2'>Full Name</th>
	<th rowspan='2'>Profile Type</th>
	<th rowspan='2'>User Type</th>
	<th style="text-align:center;" colspan='5' rowspan='1'>Missions</th>
	<th style="text-align:center;" colspan='2' rowspan='1'>Royalties Gained</th>
	
	<th rowspan='2'>DOJ</th>
	<th rowspan='2'>Country</th>
	<th rowspan='2'>Categories</th>
   </tr>
   <tr>
   <th rowspan='1'>participated</th>
	<th rowspan='1'>Ongoing</th>
	<th rowspan='1'>Closed</th>
	<th rowspan='1'>Refused</th>
	<th rowspan='1'>Published</th>
	<th rowspan='1'>Total</th>
	<th rowspan='1'>This Month</th>
	</tr>
   </thead>
   <tbody >
	<?php if ($this->_tpl_vars['user_details'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['user_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['userdetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['userdetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['userdetails']['iteration']++;
?>
		<tr>
		<td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['first_name']; ?>
 <?php echo $this->_tpl_vars['user']['last_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['type']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['profile_type']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['mission_participation']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['mission_participation_ongoing']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['mission_participation_closed']; ?>

		<td><?php echo $this->_tpl_vars['user']['mission_participation_refused']; ?>
</td></td>
		<td><?php echo $this->_tpl_vars['user']['mission_participation_published']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['royalties']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['royalties_month']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['created_at']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['country']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['categories']; ?>
</td>
	   </tr>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<tr>
			<td colspan="3">
				<span class="no-data">Il n'y a pas d'articles en attente d'attribution</span>
			</td>
		</tr>
	<?php endif; ?>			
   </tbody>
  </table>
      
  </div></div>
  <!-- Tab 2 start -->
  <div class="tab-pane" id="clients">
		
			 <div class="panel-body" style='overflow:auto;height:600px;'>


  <!-- Table -->
  <table class="table" >
	<thead >
   <tr>
	<th >Email</th>
	<th >Full Name</th>
	<th >Profile Type</th>
	<th >DOJ</th>
	<th >Country</th>
	

	</tr>
   </thead>
   <tbody >
	<?php if ($this->_tpl_vars['user_details'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['user_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['userdetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['userdetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['userdetails']['iteration']++;
?>
		<?php if ($this->_tpl_vars['user']['type'] == 'client'): ?>
		<tr>
		<td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['first_name']; ?>
 <?php echo $this->_tpl_vars['user']['last_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['type']; ?>
</td>
		
		<td><?php echo $this->_tpl_vars['user']['created_at']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['country']; ?>
</td>
		
	   </tr>
	   <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<tr>
			<td colspan="3">
				<span class="no-data">Il n'y a pas d'articles en attente d'attribution</span>
			</td>
		</tr>
	<?php endif; ?>			
   </tbody>
  </table>
      
  </div>
  </div>
  <!-- Tab 3 start -->
  <div class="tab-pane" id="contributers">
	  <div class="panel-body" style='overflow:auto;height:600px;'>


  <!-- Table -->
  <table class="table" >
	<thead >
   <tr>
	<th rowspan='2'>Email</th>
	<th rowspan='2'>Full Name</th>
	<th rowspan='2'>Profile Type</th>
	<th rowspan='2'>User Type</th>
	<th style="text-align:center;" colspan='5' rowspan='1'>Missions</th>
	<th style="text-align:center;" colspan='2' rowspan='1'>Royalties Gained</th>
	
	<th rowspan='2'>DOJ</th>
	<th rowspan='2'>Country</th>
	<th rowspan='2'>Categories</th>
   </tr>
   <tr>
   <th rowspan='1'>participated</th>
	<th rowspan='1'>Ongoing</th>
	<th rowspan='1'>Closed</th>
	<th rowspan='1'>Refused</th>
	<th rowspan='1'>Published</th>
	<th rowspan='1'>Total</th>
	<th rowspan='1'>This Month</th>
	</tr>
   </thead>
   <tbody >
	<?php if ($this->_tpl_vars['user_details'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['user_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['userdetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['userdetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['userdetails']['iteration']++;
?>
		<?php if ($this->_tpl_vars['user']['type'] == 'contributor'): ?>
		<tr>
		<td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['first_name']; ?>
 <?php echo $this->_tpl_vars['user']['last_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['type']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['profile_type']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['mission_participation']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['mission_participation_ongoing']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['mission_participation_closed']; ?>

		<td><?php echo $this->_tpl_vars['user']['mission_participation_refused']; ?>
</td></td>
		<td><?php echo $this->_tpl_vars['user']['mission_participation_published']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['royalties']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['royalties_month']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['created_at']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['country']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['categories']; ?>
</td>
	   </tr>
	   <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<tr>
			<td colspan="3">
				<span class="no-data">Il n'y a pas d'articles en attente d'attribution</span>
			</td>
		</tr>
	<?php endif; ?>			
   </tbody>
  </table>
      
  </div></div>
  <!-- Tab 4 start -->
  <div class="tab-pane" id="suadmins">
		
			 <div class="panel-body" style='overflow:auto;height:600px;'>


  <!-- Table -->
  <table class="table" >
	<thead >
   <tr>
	<th >Email</th>
	<th >Full Name</th>
	<th >Profile Type</th>
	<th >DOJ</th>
	<th >Country</th>
	

	</tr>
   </thead>
   <tbody >
	<?php if ($this->_tpl_vars['user_details'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['user_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['userdetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['userdetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['userdetails']['iteration']++;
?>
		<?php if ($this->_tpl_vars['user']['type'] == 'superadmin'): ?>
		<tr>
		<td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['first_name']; ?>
 <?php echo $this->_tpl_vars['user']['last_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['type']; ?>
</td>
		
		<td><?php echo $this->_tpl_vars['user']['created_at']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['country']; ?>
</td>
		
	   </tr>
	   <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<tr>
			<td colspan="3">
				<span class="no-data">Il n'y a pas d'articles en attente d'attribution</span>
			</td>
		</tr>
	<?php endif; ?>			
   </tbody>
  </table>
      
  </div>
  </div>
  <!-- Tab 5 start -->
  <div class="tab-pane" id="editors"> <div class="panel-body" style='overflow:auto;height:600px;'>


  <!-- Table -->
  <table class="table" >
	<thead >
   <tr>
	<th >Email</th>
	<th >Full Name</th>
	<th >Profile Type</th>
	<th >DOJ</th>
	<th >Country</th>
	

	</tr>
   </thead>
   <tbody >
	<?php if ($this->_tpl_vars['user_details'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['user_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['userdetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['userdetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['userdetails']['iteration']++;
?>
		<?php if ($this->_tpl_vars['user']['type'] == 'editor'): ?>
		<tr>
		<td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['first_name']; ?>
 <?php echo $this->_tpl_vars['user']['last_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['type']; ?>
</td>
		
		<td><?php echo $this->_tpl_vars['user']['created_at']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['country']; ?>
</td>
		
	   </tr>
	   <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<tr>
			<td colspan="3">
				<span class="no-data">Il n'y a pas d'articles en attente d'attribution</span>
			</td>
		</tr>
	<?php endif; ?>			
   </tbody>
  </table>
      
  </div></div>
  <!-- Tab 6 start -->
  <div class="tab-pane" id="ceditors"> <div class="panel-body" style='overflow:auto;height:600px;'>


  <!-- Table -->
  <table class="table" >
	<thead >
   <tr>
	<th >Email</th>
	<th >Full Name</th>
	<th >Profile Type</th>
	<th >DOJ</th>
	<th >Country</th>
	

	</tr>
   </thead>
   <tbody >
	<?php if ($this->_tpl_vars['user_details'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['user_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['userdetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['userdetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['userdetails']['iteration']++;
?>
		<?php if ($this->_tpl_vars['user']['type'] == 'chiefeditor'): ?>
		<tr>
		<td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['first_name']; ?>
 <?php echo $this->_tpl_vars['user']['last_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['type']; ?>
</td>
		
		<td><?php echo $this->_tpl_vars['user']['created_at']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['country']; ?>
</td>
		
	   </tr>
	   <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<tr>
			<td colspan="3">
				<span class="no-data">Il n'y a pas d'articles en attente d'attribution</span>
			</td>
		</tr>
	<?php endif; ?>			
   </tbody>
  </table>
      
  </div></div>
  <!-- Tab 7 start -->
  <div class="tab-pane" id="cfd">
		 <div class="panel-body" style='overflow:auto;height:600px;'>


  <!-- Table -->
  <table class="table" >
	<thead >
   <tr>
	<th >Email</th>
	<th >Full Name</th>
	<th >Profile Type</th>
	<th >DOJ</th>
	<th >Country</th>
	

	</tr>
   </thead>
   <tbody >
	<?php if ($this->_tpl_vars['user_details'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['user_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['userdetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['userdetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['userdetails']['iteration']++;
?>
		<?php if ($this->_tpl_vars['user']['type'] == 'chiefodigeo'): ?>
		<tr>
		<td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['first_name']; ?>
 <?php echo $this->_tpl_vars['user']['last_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['type']; ?>
</td>
		
		<td><?php echo $this->_tpl_vars['user']['created_at']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['country']; ?>
</td>
		
	   </tr>
	   <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<tr>
			<td colspan="3">
				<span class="no-data">Il n'y a pas d'articles en attente d'attribution</span>
			</td>
		</tr>
	<?php endif; ?>			
   </tbody>
  </table>
      
  </div>
  </div>
  <!-- Tab 8 start -->
  <div class="tab-pane" id="ceo"> <div class="panel-body" style='overflow:auto;height:600px;'>


  <!-- Table -->
  <table class="table" >
	<thead >
   <tr>
	<th >Email</th>
	<th >Full Name</th>
	<th >Profile Type</th>
	<th >DOJ</th>
	<th >Country</th>
	

	</tr>
   </thead>
   <tbody >
	<?php if ($this->_tpl_vars['user_details'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['user_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['userdetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['userdetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['userdetails']['iteration']++;
?>
		<?php if ($this->_tpl_vars['user']['type'] == 'ceouser'): ?>
		<tr>
		<td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['first_name']; ?>
 <?php echo $this->_tpl_vars['user']['last_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['type']; ?>
</td>
		
		<td><?php echo $this->_tpl_vars['user']['created_at']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['country']; ?>
</td>
		
	   </tr>
	   <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<tr>
			<td colspan="3">
				<span class="no-data">Il n'y a pas d'articles en attente d'attribution</span>
			</td>
		</tr>
	<?php endif; ?>			
   </tbody>
  </table>
      
  </div></div>
  <!-- Tab 9 start -->
  <div class="tab-pane" id="cc"> <div class="panel-body" style='overflow:auto;height:600px;'>


  <!-- Table -->
  <table class="table" >
	<thead >
   <tr>
	<th >Email</th>
	<th >Full Name</th>
	<th >Profile Type</th>
	<th >DOJ</th>
	<th >Country</th>
	

	</tr>
   </thead>
   <tbody >
	<?php if ($this->_tpl_vars['user_details'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['user_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['userdetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['userdetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['userdetails']['iteration']++;
?>
		<?php if ($this->_tpl_vars['user']['type'] == 'customercare'): ?>
		<tr>
		<td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['first_name']; ?>
 <?php echo $this->_tpl_vars['user']['last_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['type']; ?>
</td>
		
		<td><?php echo $this->_tpl_vars['user']['created_at']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['country']; ?>
</td>
		
	   </tr>
	   <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<tr>
			<td colspan="3">
				<span class="no-data">Il n'y a pas d'articles en attente d'attribution</span>
			</td>
		</tr>
	<?php endif; ?>			
   </tbody>
  </table>
      
  </div></div>
  <!-- Tab 10 start -->
  <div class="tab-pane" id="fact"> <div class="panel-body" style='overflow:auto;height:600px;'>


  <!-- Table -->
  <table class="table" >
	<thead >
   <tr>
	<th >Email</th>
	<th >Full Name</th>
	<th >Profile Type</th>
	<th >DOJ</th>
	<th >Country</th>
	

	</tr>
   </thead>
   <tbody >
	<?php if ($this->_tpl_vars['user_details'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['user_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['userdetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['userdetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['userdetails']['iteration']++;
?>
		<?php if ($this->_tpl_vars['user']['type'] == 'facturation'): ?>
		<tr>
		<td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['first_name']; ?>
 <?php echo $this->_tpl_vars['user']['last_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['type']; ?>
</td>
		
		<td><?php echo $this->_tpl_vars['user']['created_at']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['country']; ?>
</td>
		
	   </tr>
	   <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<tr>
			<td colspan="3">
				<span class="no-data">Il n'y a pas d'articles en attente d'attribution</span>
			</td>
		</tr>
	<?php endif; ?>			
   </tbody>
  </table>
      
  </div></div>
  <!-- Tab 11 start -->
  <div class="tab-pane" id="multi"> <div class="panel-body" style='overflow:auto;height:600px;'>


  <!-- Table -->
  <table class="table" >
	<thead >
   <tr>
	<th >Email</th>
	<th >Full Name</th>
	<th >Profile Type</th>
	<th >DOJ</th>
	<th >Country</th>
	
	</tr>
   </thead>
   <tbody >
	<?php if ($this->_tpl_vars['user_details'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['user_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['userdetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['userdetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['userdetails']['iteration']++;
?>
		<?php if ($this->_tpl_vars['user']['type'] == 'multilingue'): ?>
		<tr>
		<td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['first_name']; ?>
 <?php echo $this->_tpl_vars['user']['last_name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['type']; ?>
</td>
		
		<td><?php echo $this->_tpl_vars['user']['created_at']; ?>
</td>
		<td><?php echo $this->_tpl_vars['user']['country']; ?>
</td>
		
	   </tr>
	   <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<tr>
			<td colspan="3">
				<span class="no-data">Il n'y a pas d'articles en attente d'attribution</span>
			</td>
		</tr>
	<?php endif; ?>			
   </tbody>
  </table>
      
  </div></div>
</div>

  
  
</div>
</div>