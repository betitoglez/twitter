<?php

class Encrypt_HmacSha1 extends Encrypt_Signature {
	/**
	 * {@inheritDoc}
	 */
	public function getName()
	{
		return "HMAC-SHA1";
	}
	/**
	 * {@inheritDoc}
	 */
	public function buildSignature(Twitter_Request $request, Twitter_Consumer $consumer, Twitter_Token $token = null)
	{
		$signatureBase = $request->getSignatureBaseString();
		$request->baseString = $signatureBase;
		$parts = array($consumer->secret, null !== $token ? $token->secret : "");
		$parts = Util::urlencodeRfc3986($parts);
		$key = implode('&', $parts);
		return base64_encode(hash_hmac('sha1', $signatureBase, $key, true));
	}
}
