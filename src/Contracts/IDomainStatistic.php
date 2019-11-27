<?php

namespace PostMix\LaravelBitaps\Contracts;

use Illuminate\Support\Collection;
use PostMix\LaravelBitaps\Entities\DomainStatistic;
use PostMix\LaravelBitaps\Models\Domain;

/**
 * Interface IDomainStatistic
 * @package PostMix\LaravelBitaps\Contracts
 *
 * TODO should be implemented
 */
interface IDomainStatistic
{
    /**
     * Fetch domain statistic
     *
     * @param Domain $domain
     *
     * @return DomainStatistic
     */
    public function getDomainStatistic(Domain $domain): DomainStatistic;

    /**
     * Get addresses list of the provided domain
     *
     * @param Domain $domain
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return Collection
     */
    public function getDomainAddresses(
        Domain $domain,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): Collection;

    /**
     * Get transactions list of the provided domain
     *
     * @param Domain $domain
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return Collection
     */
    public function getDomainTransactions(
        Domain $domain,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): Collection;

    /**
     * Get daily statistic of the domain
     *
     * @param Domain $domain
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return Collection
     */
    public function getDomainDailyStatistic(
        Domain $domain,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): Collection;
}
