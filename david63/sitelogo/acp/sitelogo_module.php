<?php
/**
*
* @package Site Logo Extension
* @copyright (c) 2014 david63
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace david63\sitelogo\acp;

class sitelogo_module
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	public $u_action;

	function main($id, $mode)
	{
		global $user, $template, $request, $config, $phpbb_log;

		$this->config	= $config;
		$this->request	= $request;
		$this->template	= $template;
		$this->user		= $user;

		$this->tpl_name		= 'sitelogo_manage';
		$this->page_title	= $user->lang('SITE_LOGO');
		$form_key			= 'sitelogo';
		add_form_key($form_key);

		// Positions
		$positions = array();

		$positions[] = $user->lang('LOGO_LEFT');
		$positions[] = $user->lang('LOGO_CENTRE');
		$positions[] = $user->lang('LOGO_RIGHT');

		foreach ($positions as $value => $label)
		{
			$this->template->assign_block_vars('positions', array(
				'S_CHECKED'	=> ($this->config['site_logo_position'] == $value) ? true : false,
				'LABEL'		=> $label,
				'VALUE'		=> $value,
			));
		}

		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key($form_key))
			{
				trigger_error($this->user->lang('FORM_INVALID') . adm_back_link($this->u_action), E_USER_WARNING);
			}

			$this->config->set('site_logo_height', $this->request->variable('site_logo_height', ''));
			$this->config->set('site_logo_image', $this->request->variable('site_logo_image', ''));
			$this->config->set('site_logo_left', $this->request->variable('site_logo_left', 0));
			$this->config->set('site_logo_pixels', $this->request->variable('site_logo_pixels', 0));
			$this->config->set('site_logo_position', $this->request->variable('site_logo_position', 0));
			$this->config->set('site_logo_remove', $this->request->variable('site_logo_remove', 0));
			$this->config->set('site_logo_right', $this->request->variable('site_logo_right', 0));
			$this->config->set('site_logo_width', $this->request->variable('site_logo_width', ''));
			$this->config->set('site_name_supress', $this->request->variable('site_name_supress', 0));
			$this->config->set('site_search_remove', $this->request->variable('site_search_remove', 0));

			$phpbb_log->add('admin', $this->user->data['user_id'], $this->user->ip, 'SITE_LOGO_LOG');
			trigger_error($user->lang['CONFIG_UPDATED'] . adm_back_link($this->u_action));
		}

		$this->template->assign_vars(array(
			'SITE_LOGO_HEIGHT'		=> isset($this->config['site_logo_height']) ? $this->config['site_logo_height'] : '',
			'SITE_LOGO_IMAGE'		=> isset($this->config['site_logo_image']) ? $this->config['site_logo_image'] : '',
			'SITE_LOGO_LEFT'		=> isset($this->config['site_logo_left']) ? $this->config['site_logo_left'] : '',
			'SITE_LOGO_PIXELS'		=> isset($this->config['site_logo_pixels']) ? $this->config['site_logo_pixels'] : '',
			'SITE_LOGO_REMOVE'		=> isset($this->config['site_logo_remove']) ? $this->config['site_logo_remove'] : '',
			'SITE_LOGO_RIGHT'		=> isset($this->config['site_logo_right']) ? $this->config['site_logo_right'] : '',
			'SITE_LOGO_WIDTH'		=> isset($this->config['site_logo_width']) ? $this->config['site_logo_width'] : '',
			'SITE_NAME_SUPRESS'		=> isset($this->config['site_name_supress']) ? $this->config['site_name_supress'] : '',
			'SITE_SEARCH_REMOVE'	=> isset($this->config['site_search_remove']) ? $this->config['site_search_remove'] : '',

			'U_ACTION'			=> $this->u_action,
		));

	}
}
