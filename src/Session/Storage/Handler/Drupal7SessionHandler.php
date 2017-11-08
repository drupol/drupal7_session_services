<?php

namespace drupol\drupal7_session_services\Session\Storage\Handler;

/**
 * Class Drupal7SessionHandler.
 */
class Drupal7SessionHandler implements \SessionHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function close()
    {
        return _drupal_session_close();
    }

    /**
     * {@inheritdoc}
     */
    public function destroy($session_id)
    {
        return _drupal_session_destroy($session_id);
    }

    /**
     * {@inheritdoc}
     */
    public function gc($maxlifetime)
    {
        return _drupal_session_garbage_collection($maxlifetime);
    }

    /**
     * {@inheritdoc}
     */
    public function open($save_path, $name)
    {
        return _drupal_session_open();
    }

    /**
     * {@inheritdoc}
     */
    public function read($session_id)
    {
        return _drupal_session_read($session_id);
    }

    /**
     * {@inheritdoc}
     */
    public function write($session_id, $session_data)
    {
        return _drupal_session_write($session_id, $session_data);
    }
}
