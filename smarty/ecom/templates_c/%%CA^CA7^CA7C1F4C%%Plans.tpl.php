<?php /* Smarty version 2.6.26, created on 2010-01-19 00:45:11
         compiled from Plans.tpl */ ?>
<ul id="plans">
Here's an awesome list of plans we offer!
<?php unset($this->_sections['plan']);
$this->_sections['plan']['name'] = 'plan';
$this->_sections['plan']['loop'] = is_array($_loop=$this->_tpl_vars['plans']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['plan']['show'] = true;
$this->_sections['plan']['max'] = $this->_sections['plan']['loop'];
$this->_sections['plan']['step'] = 1;
$this->_sections['plan']['start'] = $this->_sections['plan']['step'] > 0 ? 0 : $this->_sections['plan']['loop']-1;
if ($this->_sections['plan']['show']) {
    $this->_sections['plan']['total'] = $this->_sections['plan']['loop'];
    if ($this->_sections['plan']['total'] == 0)
        $this->_sections['plan']['show'] = false;
} else
    $this->_sections['plan']['total'] = 0;
if ($this->_sections['plan']['show']):

            for ($this->_sections['plan']['index'] = $this->_sections['plan']['start'], $this->_sections['plan']['iteration'] = 1;
                 $this->_sections['plan']['iteration'] <= $this->_sections['plan']['total'];
                 $this->_sections['plan']['index'] += $this->_sections['plan']['step'], $this->_sections['plan']['iteration']++):
$this->_sections['plan']['rownum'] = $this->_sections['plan']['iteration'];
$this->_sections['plan']['index_prev'] = $this->_sections['plan']['index'] - $this->_sections['plan']['step'];
$this->_sections['plan']['index_next'] = $this->_sections['plan']['index'] + $this->_sections['plan']['step'];
$this->_sections['plan']['first']      = ($this->_sections['plan']['iteration'] == 1);
$this->_sections['plan']['last']       = ($this->_sections['plan']['iteration'] == $this->_sections['plan']['total']);
?>
	<li><a href="index.php?p=Plan&plan=<?php echo $this->_tpl_vars['plans'][$this->_sections['plan']['index']]['uuid']; ?>
"><img scr="images/<?php echo $this->_tpl_vars['plans'][$this->_sections['plan']['index']]['image']; ?>
" alt="<?php echo $this->_tpl_vars['plans'][$this->_sections['plan']['index']]['name']; ?>
" /></a></li>
<?php endfor; else: ?>
	<li class="none">No Plans Avaliable</li>
<?php endif; ?>
</ul>