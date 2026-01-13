<?php

namespace Kanboard\Plugin\Katex;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base {
	public function initialize() {
		$this->hook->on('template:layout:css', array('template' => 'plugins/Katex/assets/katex.min.css'));
		$this->hook->on('template:layout:js', array('template' => 'plugins/Katex/assets/katex.min.js'));
		$this->template->hook->attach('template:task:show:bottom', 'Katex:task/show/bottom');
		$script_hash = "sha256-QYu4ckfUb1GwKhDpPX2ONzaiEH9LpfBiEzTRFclZ1wA=";
		if (array_key_exists("script-src", $this->container['cspRules'])){
			$cspRules = $this->container['cspRules'];
			$cspRules['script-src'] = $this->container['cspRules']['script-src'] . " '" . $script_hash . "'";
			$this->container['cspRules'] = $cspRules;
		}
		else {
			$cspRules = array_merge($this->container['cspRules'], array("script-src" => "'self' '" . $script_hash . "'"));
			$this->container['cspRules'] = $cspRules;
		}
	}

    public function getPluginName()
    {
        return 'Katex';
    }

    public function getPluginDescription()
    {
        return t('Kanboard plugin to display formulas with katex code.');
    }

    public function getPluginAuthor()
    {
        return 'mduret';
    }

    public function getPluginVersion()
    {
        return '0.16.22-1';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.11';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/mduret/kanboard-plugin-katex/';
    }
}