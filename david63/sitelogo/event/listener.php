<?php
/**
*
* @package Site Logo Extension
* @copyright (c) 2014 david63
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace david63\sitelogo\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\twig\twig */
	protected $template;

	/** @var string phpBB root path */
	protected $root_path;

	/**
	* Constructor for listener
	*
	* @param \phpbb\config\config $config phpBB config
	* @param \phpbb\template\twig\twig $template phpBB template
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\template\twig\twig $template, $root_path)
	{
		$this->config		= $config;
		$this->template		= $template;
		$this->root_path	= $root_path;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.acp_board_config_edit_add'	=> 'acp_board_settings',
			'core.page_header_after'			=> 'site_logo',
		);
	}

	/**
	* Set ACP board settings
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function acp_board_settings($event)
	{
	    if ($event['mode'] == 'settings')
        {
			$display_vars = $event['display_vars'];

			$sitelogo_config_vars = array(
				'legend10'			=> 'SITE_LOGO',
                'site_logo_image'	=> array('lang' => 'SITE_LOGO_IMAGE', 'validate' => 'string', 'type' => 'text:50:255', 'explain' => true),
				'site_logo_width'	=> array('lang' => 'SITE_LOGO_WIDTH', 'validate' => 'string', 'type' => 'text:4,4', 'explain' => true),
                'site_logo_height'	=> array('lang' => 'SITE_LOGO_HEIGHT', 'validate' => 'string', 'type' => 'text:4,4', 'explain' => true),
				'site_logo_pixels'	=> array('lang' => 'SITE_LOGO_PIXELS', 'validate' => 'int:0:99', 'type' => 'number:0:99', 'explain' => true),
				'site_logo_left'	=> array('lang' => 'SITE_LOGO_LEFT', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'site_logo_right'	=> array('lang' => 'SITE_LOGO_RIGHT', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
			);

			$insert_after	= 'legend2';
			$position		= array_search($insert_after, array_keys($display_vars['vars'])) + 5;

			$display_vars['vars'] = array_merge(
				array_slice($display_vars['vars'], 0, $position),
				$sitelogo_config_vars,
                array_slice($display_vars['vars'], $position)
            );

            $event['display_vars'] = $display_vars;
		}
	}

	/**
	* Update the template variables
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function site_logo($event)
	{
		if ($this->config['site_logo_image'])
		{
			$logo_path = (strpos(strtolower($this->config['site_logo_image']), 'http') !== false) ? $this->config['site_logo_image'] : append_sid($this->root_path . $this->config['site_logo_image'], false, false);

			$logo_corners = '0px 0px 0px 0px';
			$logo_corners = ($this->config['site_logo_left']) ? $this->config['site_logo_pixels'] . 'px 0px 0px ' . $this->config['site_logo_pixels'] . 'px' : $logo_corners;
 			$logo_corners = ($this->config['site_logo_right']) ? '0px ' . $this->config['site_logo_pixels'] . 'px ' . $this->config['site_logo_pixels'] . 'px 0px' : $logo_corners;
			$logo_corners = ($this->config['site_logo_left'] && $this->config['site_logo_right']) ? $this->config['site_logo_pixels'] . 'px ' . $this->config['site_logo_pixels'] . 'px ' . $this->config['site_logo_pixels'] . 'px ' . $this->config['site_logo_pixels'] . 'px' : $logo_corners;

			$this->template->assign_vars(array(
				'SITE_LOGO_IMG'	=> '<img src=' . $logo_path . ' style="height:' . $this->config['site_logo_height'] . '; width:' . $this->config['site_logo_width'] . '; -webkit-border-radius: ' . $logo_corners . '; -moz-border-radius: ' . $logo_corners . '; border-radius: ' . $logo_corners . ';">',
			));
		}
	}
}