<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Preview
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Preview\DeployedDevices\Fleet;

use Twilio\Exceptions\TwilioException;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;


class KeyContext extends InstanceContext
    {
    /**
     * Initialize the KeyContext
     *
     * @param Version $version Version that contains the resource
     * @param string $fleetSid 
     * @param string $sid Provides a 34 character string that uniquely identifies the requested Key credential resource.
     */
    public function __construct(
        Version $version,
        $fleetSid,
        $sid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'fleetSid' =>
            $fleetSid,
        'sid' =>
            $sid,
        ];

        $this->uri = '/Fleets/' . \rawurlencode($fleetSid)
        .'/Keys/' . \rawurlencode($sid)
        .'';
    }

    /**
     * Delete the KeyInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool
    {

        return $this->version->delete('DELETE', $this->uri);
    }


    /**
     * Fetch the KeyInstance
     *
     * @return KeyInstance Fetched KeyInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): KeyInstance
    {

        $payload = $this->version->fetch('GET', $this->uri);

        return new KeyInstance(
            $this->version,
            $payload,
            $this->solution['fleetSid'],
            $this->solution['sid']
        );
    }


    /**
     * Update the KeyInstance
     *
     * @param array|Options $options Optional Arguments
     * @return KeyInstance Updated KeyInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): KeyInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'FriendlyName' =>
                $options['friendlyName'],
            'DeviceSid' =>
                $options['deviceSid'],
        ]);

        $payload = $this->version->update('POST', $this->uri, [], $data);

        return new KeyInstance(
            $this->version,
            $payload,
            $this->solution['fleetSid'],
            $this->solution['sid']
        );
    }


    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.DeployedDevices.KeyContext ' . \implode(' ', $context) . ']';
    }
}
