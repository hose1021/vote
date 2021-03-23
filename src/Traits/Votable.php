<?php

namespace Hose1021\Vote\Traits;

use Hose1021\Vote\Exceptions\UnexpectValueException;
use Illuminate\Database\Eloquent\Model;
use Hose1021\Vote\VoteItems;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Trait Votable
 *
 * @mixin Model
 */
trait Votable
{
    /**
     * @param Model       $user
     * @param string|null $type
     * @return bool
     * @throws UnexpectValueException
     */
    public function isVotedBy(Model $user, ?string $type = null): bool
    {
        if (\is_a($user, \config('auth.providers.users.model'))) {
            if ($this->relationLoaded('voters')) {
                return $this->voters->contains($user);
            }

            return $this->voters()
                ->where(\config('vote.user_foreign_key'), $user->getKey())
                ->when(\is_string($type), function ($builder) use ($type) {
                    $builder->where('vote_type', (string)new VoteItems($type));
                })
                ->exists();
        }

        return false;
    }

    /**
     * Return voters.
     *
     * @return BelongsToMany
     */
    public function voters(): BelongsToMany
    {
        return $this->belongsToMany(
            \config('auth.providers.users.model'),
            \config('vote.votes_table'),
            'votable_id',
            \config('vote.user_foreign_key')
        )
            ->where('votable_type', $this->getMorphClass());
    }

    /**
     * @param Model $user
     *
     * @return bool
     * @throws UnexpectValueException
     */
    public function isUpVotedBy(Model $user): bool
    {
        return $this->isVotedBy($user, VoteItems::UP);
    }

    /**
     * Return up voters.
     *
     * @return BelongsToMany
     */
    public function upVoters(): BelongsToMany
    {
        return $this->voters()->where('vote_type', VoteItems::UP);
    }

    /**
     * @param Model $user
     *
     * @return bool
     * @throws UnexpectValueException
     */
    public function isDownVotedBy(Model $user): bool
    {
        return $this->isVotedBy($user, VoteItems::DOWN);
    }

    /**
     * Return down voters.
     *
     * @return BelongsToMany
     */
    public function downVoters(): BelongsToMany
    {
        return $this->voters()->where('vote_type', VoteItems::DOWN);
    }
}
