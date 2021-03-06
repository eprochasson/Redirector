<?php
/**
 * @package redirector
 * @subpackage processors
 */

/* get obj */
if (empty($scriptProperties['id'])) return $modx->error->failure($modx->lexicon('redirector.redirect_err_ns'));
$redirect = $modx->getObject('modRedirect',$scriptProperties['id']);
if (empty($redirect)) return $modx->error->failure($modx->lexicon('redirector.redirect_err_nf'));

/* put checkbox to 0 if not present in the array */
if(!array_key_exists('active', $scriptProperties))
    $scriptProperties['active'] = '0';

/* same with isregexp */
if(!array_key_exists('isregexp', $scriptProperties))
    $scriptProperties['isregexp'] = '0';


/* set fields */
$redirect->fromArray($scriptProperties);

/* save */
if ($redirect->save() == false) {

    return $modx->error->failure($modx->lexicon('redirector.redirect_err_save'));
}


return $modx->error->success('',$redirect);