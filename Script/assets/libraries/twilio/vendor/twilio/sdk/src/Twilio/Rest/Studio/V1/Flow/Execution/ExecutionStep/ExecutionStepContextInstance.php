<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStep;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property array $context
 * @property string $executionSid
 * @property string $flowSid
 * @property string $stepSid
 * @property string $url
 */
class ExecutionStepContextInstance extends InstanceResource {
    /**
     * Initialize the ExecutionStepContextInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $flowSid The SID of the Flow
     * @param string $executionSid The SID of the Execution
     * @param string $stepSid Step SID
     * @return \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStep\ExecutionStepContextInstance
     */
    public function __construct(Version $version, array $payload, $flowSid, $executionSid, $stepSid) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'context' => Values::array_get($payload, 'context'),
            'executionSid' => Values::array_get($payload, 'execution_sid'),
            'flowSid' => Values::array_get($payload, 'flow_sid'),
            'stepSid' => Values::array_get($payload, 'step_sid'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array(
            'flowSid' => $flowSid,
            'executionSid' => $executionSid,
            'stepSid' => $stepSid,
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStep\ExecutionStepContextContext Context for this
     *                                                                                         ExecutionStepContextInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ExecutionStepContextContext(
                $this->version,
                $this->solution['flowSid'],
                $this->solution['executionSid'],
                $this->solution['stepSid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a ExecutionStepContextInstance
     *
     * @return ExecutionStepContextInstance Fetched ExecutionStepContextInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Studio.V1.ExecutionStepContextInstance ' . implode(' ', $context) . ']';
    }
}