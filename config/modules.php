<?php

return [
    ['settings', 'cms/settings/1/edit', 'app.settings', 'fa-edit', [], false],    
    ['company', 'cms/company/1/edit', 'app.company', 'fa-briefcase', [], true],
    ['texts', 'cms/texts', 'app.texts', 'fa-font', [], true],
    ['admins', 'cms/admins', 'CMS Admins', 'fa-unlock-alt', ['app.list' => '/', 'app.add' => '/create'], true],
];